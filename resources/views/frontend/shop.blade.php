<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="csrf-token" token="{{csrf_token()}}">
        <title>Shop Homepage - Start Bootstrap Template</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="#!">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="#!">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#!">All Products</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#!">Popular Items</a></li>
                                <li><a class="dropdown-item" href="#!">New Arrivals</a></li>
                            </ul>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <button class="btn btn-outline-dark" type="submit">
                            <i class="bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            <div class="container px-4 px-lg-5 mt-5">
                <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                    @foreach($products as $product)
                    <div class="col mb-5">
                        <div class="card h-100">
                            <!-- Product image-->
                            <img class="card-img-top" src="{{asset('storage/'. $product->image_path)}}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <span style="position: relative; background-color:green;color:white;border-radius:.3rem;padding:.2rem;top:-1.7rem;left:-1.5rem;font-size:.785rem;font-weight:bold;  ">{{$product->category->name}}</span>
                                <span style="position: relative; background-color:gold;color:white;border-radius:.3rem;padding:.2rem;top:-1.7rem;left:-1.5rem;font-size:.785rem;font-weight:bold;  ">{{$product->material->name}}</span>
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{$product->name}}</h5>
                                    <p>{{$product->designation}}</p>
                                    <!-- Product price-->
                                    ${{$product->gram_buying_price}} - $
                                </div>
                                <input type="hidden" id="gram_selling_price" value="{{$product->gram_selling_price}}">
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer text-center p-4 pt-0 border-top-0 bg-transparent">
                            <!-- Button trigger modal -->
                            <button type="button" id="modalBtn" class="btn btn-primary d-inline-block " data-toggle="modal" data-target="#exampleModalCenter">
                                Order now
                            </button>
                            
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <form id="orders-form" action="{{route('orders.store')}}" method="post">
                                        @csrf
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                            <div class="form-group mb-2">
                                                <label for="customer_name" class="label">name</label>
                                                <input type="text" name="customer_name" id="customer_name" class="form-control">
                                            </div>
                                            <div class="form-group mb-2 d-inline-block">
                                                <label for="quantity_ordered" class="label">quantity</label>
                                                <input type="number" name="quantity_ordered" id="quantity_ordered" class="form-control">
                                            </div>
                                            <input type="hidden" name="product_id" id="product_id" value="{{$product->product_id}}">
                                            <input type="hidden" name="tracking_code" id="tracking_code" >
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary closeBtn" data-dismiss="modal">Close</button>
                                            <button type="submit" id="sendOrder"  class="btn btn-primary">Send Order</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

        <script>
            const modal = new bootstrap.Modal('#exampleModalCenter')
            const button = document.querySelector('#modalBtn')
            const closeBtn = document.querySelector('.closeBtn')

            button.addEventListener('click', () => {
                modal.show()
            })

            closeBtn.addEventListener('click', () => {
                modal.hide()
            })

            // const quantityOrdered = document.getElementById('quantity_ordered')
            // const sellingPriceInput = document.getElementById('price_of_selling')
            // const gramSellingPrice = document.getElementById('gram_selling_price')

                
            // quantityOrdered.addEventListener('change', () => {
            //     sellingPriceInput.value = quantityOrdered.value * gramSellingPrice.value
            // })

            $(document).ready(function(e){
                $('#sendOrder').on('click', function(e) {
                    e.preventDefault()
                    let token = " {{ Session::token() }} "
                    let url = "{{route('orders.store')}}"

                    let productPrice = $('#gram_selling_price').val()

                    let productId = $('#product_id').val()
                    let customerName = $('#customer_name').val()
                    let quantityOrdered = $('#quantity_ordered').val()
                    let totalPrice = quantityOrdered * productPrice
                    document.getElementById('tracking_code').value = Math.floor(Math.random() * 1000)
                    let trackingCode = $('#tracking_code').val()

                    console.log(token, url, productPrice, productId, customerName, quantityOrdered, totalPrice, trackingCode);



                    $.ajax({
                        type: 'post',
                        url: url,
                        data: {
                            product_id: productId,
                            customer_name: customerName,
                            tracking_code: trackingCode,
                            quantity_ordered: quantityOrdered,
                            total_price: totalPrice,
                            _token: token
                        },

                        success: function(data) {
                            
                        },

                        error: function() {
                            alert('Something is wrong!')
                        }
                    })
                })
            });
        </script>
    </body>
</html>