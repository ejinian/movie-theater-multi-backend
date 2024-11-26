from django.shortcuts import render
from django.http import JsonResponse
from django.db.models import Avg, Sum, Count
from django.db.models.functions import TruncDate
from statistics import median
from .models import Sales


def home(request):
    total_sales = Sales.objects.aggregate(total_tickets=Sum('tickets_sold'))['total_tickets']
    avg_tickets_sold = Sales.objects.aggregate(avg_tickets=Avg('tickets_sold'))['avg_tickets']
    all_tickets = list(Sales.objects.values_list('tickets_sold', flat=True))
    median_tickets_sold = median(all_tickets) if all_tickets else None
    genre_stats = Sales.objects.values('movie__genre').annotate(total_tickets=Sum('tickets_sold')).order_by('-total_tickets')
    theater_stats = Sales.objects.values('theater__name').annotate(total_tickets=Sum('tickets_sold')).order_by('-total_tickets')[:10]

    print(total_sales)
    data = {
        "total_sales": total_sales,
        "avg_tickets_sold": avg_tickets_sold,
        "median_tickets_sold": median_tickets_sold,
        "genre_stats": list(genre_stats),
        "theater_stats": list(theater_stats),
    }
    return render(request, 'theater/home.html', context=data)


def top_theater_by_date(request, date):
    try:
        top_sale = Sales.objects.filter(date=date).order_by('-tickets_sold').first()
        if top_sale:
            data = {
                "date": date,
                "theater": top_sale.theater.name,
                "movie": top_sale.movie.title,
                "tickets_sold": top_sale.tickets_sold,
            }
        else:
            data = {"error": "No sales data found for the given date."}
        return JsonResponse(data)
    except Exception as e:
        return JsonResponse({"error": str(e)})
