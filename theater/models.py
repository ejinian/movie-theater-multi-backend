from django.db import models

class Theater(models.Model):
    name = models.CharField(max_length=255)
    location = models.CharField(max_length=255)

    def __str__(self):
        return self.name


class Movie(models.Model):
    GENRE_CHOICES = [
        ('action', 'Action'),
        ('drama', 'Drama'),
        ('comedy', 'Comedy'),
        ('horror', 'Horror'),
        ('sci-fi', 'Science Fiction'),
    ]

    title = models.CharField(max_length=255)
    genre = models.CharField(max_length=100, choices=GENRE_CHOICES)

    def __str__(self):
        return self.title


class Sales(models.Model):
    theater = models.ForeignKey(Theater, on_delete=models.CASCADE)
    movie = models.ForeignKey(Movie, on_delete=models.CASCADE)
    date = models.DateField()
    tickets_sold = models.PositiveIntegerField()

    def __str__(self):
        return f"{self.theater} - {self.movie} - {self.date}"
