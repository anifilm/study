from django.contrib import admin
from django.urls import path, include
from django.shortcuts import redirect

urlpatterns = [
    path('admin/', admin.site.urls),
    path('accounts/', include('accounts.urls')),
    path('baemin/', include('baemin.urls', namespace='baemin')),
    path('', lambda r: redirect('baemin:index'), name='root')
]
