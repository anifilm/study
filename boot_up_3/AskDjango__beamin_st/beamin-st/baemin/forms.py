from django import forms

from .models import Order, Item

class OrderForm(forms.ModelForm):
    def __init__(self, shop, *args, **kwargs):
        super().__init__(*args, **kwargs)
        self.fields['item_set'].queryset = Item.objects.filter(shop=shop.id)

    class Meta:
        model = Order
        fields = ('item_set',)
