<!doctype html>
<html lang="en">

<head>
    <title>Laracoding.com - Google reCAPTCHA V3 Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://www.google.com/recaptcha/api.js"></script>
    <script>
        function onSubmit(token) {
            document.getElementById("contactForm").submit();
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <div class="col-md-6 col-md-offset-3">

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0 mt-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    Laracoding.com - Google reCaptcha V3 Example
                </div>

                <div class="card-body">
                    <div class="container py-4">
                        <form id="contactForm" method="post" action="{{ route('contact.send') }}">
                            @csrf

                            <!-- Name input -->
                            <div class="mb-3">
                                <label class="form-label" for="name">Name</label>
                                <input class="form-control" id="name" type="text" name="name"
                                    placeholder="Name" />
                            </div>

                            <!-- Email address input -->
                            <div class="mb-3">
                                <label class="form-label" for="email">Email Address</label>
                                <input class="form-control" id="email" type="email" name="email"
                                    placeholder="Email Address" />
                            </div>

                            <!-- Message input -->
                            <div class="mb-3">
                                <label class="form-label" for="message">Message</label>
                                <textarea class="form-control" id="message" type="text" name="message" placeholder="Message"
                                    style="height: 10rem;"></textarea>
                            </div>

                            <!-- Form submit button, including reCAPTCHA V3 attributes -->
                            <div class="d-grid">
                                <button class="g-recaptcha btn btn-primary btn-lg "
                                    data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}"
                                    data-callback="onSubmit" data-action="submitContact">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card-footer text-center">
                    Made with ❤ by laracoding.com
                </div>
            </div>
        </div>
    </div>
</body>

</html>
