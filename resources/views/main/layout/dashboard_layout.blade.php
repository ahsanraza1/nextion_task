<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    body {
      margin: 0;
      padding: 0;
    }

    #sidebar {
      height: 100vh;
      width: 301px;
      position: fixed;
      top: 0;
      left: -250px;
      background-color: #343a40;
      transition: all 0.3s;
    }

    #sidebar.active {
      left: 0;
      width:120px;
    }

    #dismiss {
      width: 35px;
      height: 35px;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
    #sidebarCollapse {
      width: 35px;
      height: 35px;
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }

    #dismiss img {
      width: 100%;
    }

    #sidebar ul {
      padding: 20px 0;
      list-style-type: none;
    }

    #sidebar ul li {
      padding: 15px;
      font-size: 1.2em;
      border-bottom: 1px solid #555;
    }

    #sidebar ul li a {
      color: #fff;
      text-decoration: none;
    }

    #sidebar ul li:hover {
      background-color: #555;
    }

    #content {
      transition: margin-left 0.3s;
      /* padding: 15px; */
      margin-left: 51px;
    }

    @media (max-width: 768px) {
      #sidebar {
        left: 0;
      }

      #content {
        margin-left: 250px;
      }
    }
  </style>
</head>
<body>

<div class="wrapper">
  <nav id="sidebar">
    <div id="dismiss" class="d-none">
      <button type="button" class="btn btn-dark border border-light btn-sm float-right m-1">
        &#x2190
      </button>
    </div>
    <div id="sidebarCollapse">
        <button type="button" class="btn btn-dark border border-light btn-sm float-right m-1">
            &#x2192
          </button>
    </div>
    
    <ul class="list-unstyled components mt-5">
      {{-- <li>
        <a href="{{url('/')}}"><span class="sm float-right"><i class="fa fa-dashboard" aria-hidden="true"></i></span><span class="lg d-none">Dashboard</span></a>
      </li> --}}
      <li>
        <a href="{{route('profile')}}">
          <span class="sm float-right"><i class="fa fa-user" aria-hidden="true"></i></span><span class="lg d-none">Profile</span></a>
      </li>
      <li>
        <a href="{{route('flight-api')}}">
          <span class="sm float-right"><i class="fa fa-plane" aria-hidden="true"></i></span><span class="lg d-none">Flight</span></a>
      </li>
    </ul>
  </nav>

  <div id="content" class="px-2">

    @yield('content')

  </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<script>
  $(document).ready(function () {
    $('#sidebarCollapse').on('click', function () {
      $('#sidebar').toggleClass('active');
      $('#dismiss').removeClass('d-none');
      $('#sidebarCollapse').addClass('d-none');
      $('#content').css('margin-left', '120px');
      $('.sm').addClass('d-none');
      $('.lg').removeClass('d-none');
    });

    $('#dismiss').on('click', function () {
      $('#sidebar').removeClass('active');
      $('#sidebarCollapse').removeClass('d-none');
      $('#dismiss').addClass('d-none');
      $('#content').css('margin-left', '51px');
      $('.lg').addClass('d-none');
      $('.sm').removeClass('d-none');
    });
  });
</script>

</body>
</html>
