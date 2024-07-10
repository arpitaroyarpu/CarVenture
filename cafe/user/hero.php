
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
          theme: {
          
          }
        }
      </script>
    <title>Document</title>
</head>
<body>
    <!-- <style>
        .home_header{
            min-height: 70vh;
            padding: 48px 0;
            background: #04509D;
        }
        .container{
            max-width: ;
        }
        @media(min-width: 768px){
            .home_header{
            padding: 80px 0;
             }
        }


    </style> -->
    <section class="home_header bg-[#04509D] text-white min-h-[70vh] flex justify-center items-center">
        <div class="container py-12 md:py-20 px-4 mx-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 items-center gap-4 md:gap-12">
                <div>
                    <h5 class="text-2xl italic font-medium">Hot Stuff</h5>
                    <h5 class="text-3xl md:text-5xl font-bold capitalize !leading-snug">Grab your food today! Before it is too late...</h5>
                    <p class="text-white mt-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tenetur est tempora nemo eligendi culpa sint itaque aliquam id porro rem. Perspiciatis ea voluptatum impedit maxime! Autem totam ratione eaque a?</p>
                    <div class="mt-12">
                        <a href="#" class="py-3 px-12 rounded-xl bg-white text-black font-bold hover:translate-y-1 duration-500">Order Now</a>
                    </div>
                </div>
                <div>
                    <img src="/user/assets/images/main-slider/slider-item-2.png" alt="" class="max-w-full h-auto">
                </div>
            </div>
        </div>
    </section>
</body>
</html>