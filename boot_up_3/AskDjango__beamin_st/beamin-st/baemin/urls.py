from django.urls import path

from . import views

app_name = 'baemin'

urlpatterns = [
    path('', views.index, name='index'),
    path('<int:shop_id>/new/', views.order_new, name='order_new'),
    #path('edit/<int:pk>/', views.post_edit, name='post_edit'),
    #path('delete/<int:pk>/', views.post_delete, name='post_delete'),
    #path('like', views.post_like, name='post_like'),
    #path('bookmark', views.post_bookmark, name='post_bookmark'),
    #path('comment/new/', views.comment_new, name="comment_new"),
    #path('comment/delete/', views.comment_delete, name="comment_delete"),
]
