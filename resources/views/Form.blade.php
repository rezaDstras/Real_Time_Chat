<!DOCTYPE html>
<head>
<title>message form</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="{{ asset('js/app.js') }}"></script>
    <style>

        .error{ color:red; }

    </style>
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card mt-5">
                <div class="card-body">
                    <form id="contactForm" method="post" action="javascript:void(0)">

                        @csrf

                        <div class="form-group">

                            <label for="formGroupExampleInput">Message</label>

                            <input type="text" name="message" class="form-control" id="message" placeholder="Please enter message">

                            <span class="text-danger">{{ $errors->first('message') }}</span>

                        </div>


                        <div class="form-group">

                            <button type="submit" id="submit" class="btn btn-success">Submit</button>

                        </div>

                    </form>

                </div>
            </div>

        </div>

    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
        integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script type="text/javascript">

    $('#contactForm').on('submit',function(e){
        e.preventDefault();

        let message = $('#message').val();

        $.ajax({
            url: "http://127.0.0.1:8000/send",
            type:"POST",
            data:{
                "_token": "{{ csrf_token() }}",
                message:message,
            },
            success:function(response){
                console.log(response);
                $.toast({
                    heading: 'Successful !',
                    text: 'Message has been send !',
                    icon: 'success',
                    loader: true,        // Change it to false to disable loader
                    loaderBg: '#9EC600',  // To change the background
                    position: 'top-right',
                })
                $('#message').val('');
            },

        });
    });
</script>
</body>

