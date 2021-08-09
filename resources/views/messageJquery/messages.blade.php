<!DOCTYPE html>
<head>
    <title>Pusher Test</title>
    <script src=" {{ asset('js/app.js') }}"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
        crossorigin="anonymous">
    </script>
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

        // Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;

        var pusher = new Pusher('358ad99291b3e91377ef', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('message-channel');
        channel.bind('message-event', function(data) {
            let messagesSection = $("#messages");
            messagesSection.append(`<div class="alert alert-primary">${data.message}</div>`);
            $.toast({
                heading: 'New Message !',
                text: data.message,
                icon: 'info',
                loader: true,        // Change it to false to disable loader
                loaderBg: '#9EC600',  // To change the background
                position: 'top-right',
            })


        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"
            integrity="sha512-zlWWyZq71UMApAjih4WkaRpikgY9Bz1oXIW5G0fED4vk14JjGlQ1UmkGM392jEULP8jbNMiwLWdM8Z87Hu88Fw=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer">
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.css" integrity="sha512-8D+M+7Y6jVsEa7RD6Kv/Z7EImSpNpQllgaEIQAtqHcI0H6F4iZknRj0Nx1DCdB+TwBaS+702BGWYC0Ze2hpExQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div class="container mt-5">
    <h1>Pusher Messages</h1>
    <hr>
    <div id="messages" >
    </div>
</div>

</body>
