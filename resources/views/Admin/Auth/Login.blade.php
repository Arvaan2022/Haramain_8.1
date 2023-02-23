<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Haramain|Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset(IMG) }}/favicon.ico">

    <!-- plugins -->
    <link href="{{ asset(LIBS) }}/flatpickr/flatpickr.min.css" rel="stylesheet" type="text/css" />

    <!-- App css -->
    <link href="{{ asset(CSS) }}/../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(CSS) }}/../bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset(CSS) }}/../bootstrap/css/bootstrap-icons.css" rel="stylesheet" type="text/css" />


    <style>
        #bgGreen {
            background-color: hsl(157, 28%, 28%);
        }

        .loginCard {
            margin-block-start: 10rem;
            box-shadow: 0px 0px 50px 20px #ccc;
        }

        .bg-info {
            background-color: hsl(202, 52%, 44%) !important;
        }
    </style>

</head>

<body id="bgGreen">
    <div class="d-flex justify-content-end col-12 p-3 postion-fixed">
        <div class="col-3">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
    <div class="d-flex justify-content-center postion-fixed ">
        <div class="loginCard card text-center  rounded-4 ">
            <div class="card-body ">
                <p class="card-title p-5 fs-1 fw-lighter mb-3">{{ trans('admin.login_title') }}</p>
                <p class="card-text text-muted">{{ trans('admin.login_sub_title') }}</p>
                <form action="{{ route('admin.loginCheck') }}" method="post">
                    @csrf
                    <div class="mb-5 ">
                        <div class="input-group p-2">
                            <input type="email" class="form-control rounded-0" placeholder="email" aria-label="email"
                                name="email" aria-describedby="basic-addon2">
                            <span class="input-group-text rounded-0 bi bi-envelope-fill bg-white"
                                id="basic-addon2"></span>
                        </div>
                        <div class="input-group p-2">
                            <input type="password" class="form-control rounded-0" placeholder="password"
                                aria-label="password" name="password" aria-describedby="basic-addon2">
                            <span class="input-group-text rounded-0 bi bi-lock-fill bg-white" id="basic-addon2"></span>
                        </div>

                        <button class="btn bg-info text-white rounded-0 mt-2 px-4" type="submit">{{ trans('admin.login_btn') }}</button>
                </form>
            </div>
        </div>
    </div>
    </div>




    <link href="{{ asset(LIBS) }}/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset(LIBS) }}/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset(LIBS) }}/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
    <link href="{{ asset(LIBS) }}/datatables/select.bootstrap4.min.css" rel="stylesheet" type="text/css">
</body>

</html>
