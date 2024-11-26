from django.contrib import admin
from .models import Theater, Movie, Sales

admin.site.register(Theater)
admin.site.register(Movie)
admin.site.register(Sales)