from rest_framework import status
from rest_framework.response import Response
from rest_framework.decorators import api_view
from django.shortcuts import redirect

from .models import Product
from products.serializers import ProductSerializer

# Create your views here.

@api_view(['GET', 'POST'])
def products(request):
  
    if request.method == 'GET':
        products = Product.objects.all()
        serializer = ProductSerializer(products, many=True)
        return Response(serializer.data)

    elif request.method == 'POST':
        serializer = ProductSerializer(data=request.data)
        if serializer.is_valid():
            serializer.save()
            return Response(serializer.data, status=status.HTTP_201_CREATED)
        return Response(serializer.errors, status=status.HTTP_400_BAD_REQUEST)
    
@api_view(['GET', 'PUT', 'DELETE'])   
def productById(request, id):
 
    try:
        product = Product.objects.get(id=id)
    except Product.DoesNotExist:
        return Response(data={"message": "No existe producto con el ID: {}".format(id)} ,status=status.HTTP_400_BAD_REQUEST)

    if request.method == 'GET':
        serializer = ProductSerializer(product)
        return Response(serializer.data)

    elif request.method == 'PUT':
        serializer = ProductSerializer(product, data=request.data,partial=True)
        if serializer.is_valid():
            serializer.save()
            return redirect('products')
        return Response(data={"message": "No se pudo editar el producto con el ID: {}".format(id),"errors" : serializer.errors}, status=status.HTTP_400_BAD_REQUEST)

    elif request.method == 'DELETE':
        product.delete()
        
        return redirect('products')
