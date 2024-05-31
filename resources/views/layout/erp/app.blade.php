
<?php

$sessions = session()->all();

$user_id = session('sess_user_id');
$user_role_id = session('sess_user_role_id');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
    <!-- <link rel="stylesheet" href="style.css" /> -->
    <title> @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    @yield('style')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap");

        * {
            font-family: "Open Sans", sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --grey: #f1f0f6;
            --dark-grey: #8d8d8d;
            --light: #fff;
            --dark: #000;
            --green: #81d43a;
            --light-green: #e3ffcb;
            --blue: #1775f1;
            --light-blue: #d0e4ff;
            --dark-blue: #0c5fcd;
            --red: #fc3b56;
        }

        html {
            overflow-x: hidden;
        }

        body {
            background: var(--grey);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        li {
            list-style: none;
        }

        /* SIDEBAR */
        #sidebar {
            position: fixed;
            max-width: 260px;
            width: 100%;
            background: var(--light);
            top: 0;
            left: 0;
            height: 100%;
            overflow-y: auto;
            scrollbar-width: none;
            transition: all 0.3s ease;
            z-index: 200;
        }

        #sidebar.hide {
            max-width: 60px;
        }

        #sidebar.hide:hover {
            max-width: 260px;
        }

        #sidebar::-webkit-scrollbar {
            display: none;
        }

        #sidebar .brand {
            font-size: 24px;
            display: flex;
            align-items: center;
            height: 64px;
            font-weight: 700;
            color: var(--blue);
            position: sticky;
            top: 0;
            left: 0;
            z-index: 100;
            background: var(--light);
            transition: all 0.3s ease;
            padding: 0 6px;
        }

        #sidebar .icon {
            min-width: 48px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-right: 6px;
        }

        #sidebar .icon-right {
            margin-left: auto;
            transition: all 0.3s ease;
        }

        #sidebar .side-menu {
            margin: 36px 0;
            padding: 0 20px;
            transition: all 0.3s ease;
        }

        #sidebar.hide .side-menu {
            padding: 0 6px;
        }

        #sidebar.hide:hover .side-menu {
            padding: 0 20px;
        }

        #sidebar .side-menu a {
            display: flex;
            align-items: center;
            font-size: 14px;
            color: var(--dark);
            padding: 12px 16px 12px 0;
            transition: all 0.3s ease;
            border-radius: 10px;
            margin: 4px 0;
            white-space: nowrap;
        }

        #sidebar .side-menu>li>a:hover {
            background: var(--grey);
        }

        #sidebar .side-menu>li>a.active .icon-right {
            transform: rotateZ(90deg);
        }

        #sidebar .side-menu>li>a.active,
        #sidebar .side-menu>li>a.active:hover {
            background: #00a7c7;
            color: var(--light);
        }

        #sidebar .divider {
            margin-top: 24px;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            color: var(--dark-grey);
            transition: all 0.3s ease;
            white-space: nowrap;
        }

        #sidebar.hide:hover .divider {
            text-align: left;
        }

        #sidebar.hide .divider {
            text-align: center;
        }

        #sidebar .side-dropdown {
            padding-left: 54px;
            max-height: 0;
            overflow-y: hidden;
            transition: all 0.15s ease;
        }

        #sidebar .side-dropdown.show {
            max-height: 1000px;
        }

        #sidebar .side-dropdown a:hover {
            color: var(--blue);
        }

        #sidebar .btn-upgrade {
            font-size: 14px;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 12px 0;
            color: var(--light);
            background: var(--blue);
            transition: all 0.3s ease;
            border-radius: 5px;
            font-weight: 600;
            margin-bottom: 12px;
        }

        #sidebar .btn-upgrade:hover {
            background: var(--dark-blue);
        }

        /* SIDEBAR */

        /* CONTENT */
        #content {
            position: relative;
            width: calc(100% - 260px);
            left: 260px;
            transition: all 0.3s ease;
        }

        #sidebar.hide+#content {
            width: calc(100% - 60px);
            left: 60px;
        }

        /* NAVBAR */
        nav {
            background: var(--light);
            height: 64px;
            padding: 0 20px;
            display: flex;
            align-items: center;
            grid-gap: 28px;
            position: sticky;
            top: 0;
            left: 0;
            z-index: 100;
        }

        nav .toggle-sidebar {
            font-size: 18px;
            cursor: pointer;
        }

        nav form {
            max-width: 400px;
            width: 100%;
            margin-right: auto;
        }

        nav .form-group {
            position: relative;
        }

        nav .form-group input {
            width: 100%;
            background: var(--grey);
            border-radius: 5px;
            border: none;
            outline: none;
            padding: 10px 36px 10px 16px;
            transition: all 0.3s ease;
        }

        nav .form-group input:focus {
            box-shadow: 0 0 0 1px var(--blue), 0 0 0 4px var(--light-blue);
        }

        nav .form-group .icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            right: 16px;
            color: var(--dark-grey);
        }

        nav .nav-link {
            position: relative;
        }

        nav .nav-link .icon {
            font-size: 18px;
            color: var(--dark);
        }

        nav .nav-link .badge {
            position: absolute;
            top: -12px;
            right: -12px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--light);
            background: var(--red);
            display: flex;
            justify-content: center;
            align-items: center;
            color: var(--light);
            font-size: 10px;
            font-weight: 700;
        }

        nav .divider {
            width: 1px;
            background: var(--grey);
            height: 12px;
            display: block;
        }

        nav .profile {
            position: relative;
        }

        nav .profile img {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
        }

        nav .profile .profile-link {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            background: var(--light);
            padding: 10px 0;
            box-shadow: 4px 4px 16px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            width: 160px;
            opacity: 0;
            pointer-events: none;
            transition: all 0.3s ease;
        }

        nav .profile .profile-link.show {
            opacity: 1;
            pointer-events: visible;
            top: 100%;
        }

        nav .profile .profile-link a {
            padding: 10px 16px;
            display: flex;
            grid-gap: 10px;
            font-size: 14px;
            color: var(--dark);
            align-items: center;
            transition: all 0.3s ease;
        }

        nav .profile .profile-link a:hover {
            background: var(--grey);
        }

        /* NAVBAR */

        /* MAIN */
        main {
            width: 100%;
            padding: 24px 20px 20px 20px;
        }

        main .title {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }

        main .breadcrumbs {
            display: flex;
            grid-gap: 6px;
        }

        main .breadcrumbs li,
        main .breadcrumbs li a {
            font-size: 14px;
        }

        main .breadcrumbs li a {
            color: var(--blue);
        }

        main .breadcrumbs li a.active,
        main .breadcrumbs li.divider {
            color: var(--dark-grey);
            pointer-events: none;
        }

        /* MAIN */
        /* CONTENT */

        @media screen and (max-width: 768px) {
            #content {
                position: relative;
                width: calc(100% - 60px);
                transition: all 0.3s ease;
            }

            nav .nav-link,
            nav .divider {
                display: none;
            }

            #container {
                flex-direction: column-reverse;
            }

            #sidebar {
                max-width: 60px;
            }

            #content {
                width: 100%;
                left: 0;
            }

            #toggleSidebar {
                display: block;
                position: fixed;
                top: 20px;
                left: 20px;
                font-size: 24px;
                cursor: pointer;
            }

            #toggleSidebar:hover {
                color: var(--blue);
            }

            #container.hide-sidebar #sidebar {
                max-width: 60px;
            }

            #container.hide-sidebar #content {
                width: 100%;
                left: 0;
            }
        }

        .modal-backdrop {
    --bs-backdrop-zindex: 0 !important;
    --bs-backdrop-bg: #000;
    --bs-backdrop-opacity: 0.5;
    position: fixed;
    top: 0;
    left: 0;
    z-index: var(--bs-backdrop-zindex);
    width: 100vw;
    height: 100vh;
    background-color: var(--bs-backdrop-bg);
}

.table-border {
            border-collapse: collapse;
            width: 100%;
        }
        .table-border th, .table-border td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        .table-border th {
            background-color: #f2f2f2;
        }

    </style>
</head>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <!-- Add this button inside the sidebar -->

        <a href="{{ route('admin.dashboard') }}" class="brand"><i class="bx bxs-smile icon"></i> Mirsaige</a>
        <ul class="side-menu">
            @if (session('sess_user_id'))
                <div style="text-align: center;">
                    <img src="{{ asset(session('sess_user_photo')) }}"
                        style="margin: auto; height: 50%; border-radius: 50%; width: 50%;" alt="User Image">
                    <h6 style="margin: auto;">{{ session('sess_user_name') }}</h6>
                </div>
            @endif

            <li>
                <a href="{{ route('admin.dashboard') }}" class="active"><i class="bx bxs-dashboard icon"></i>
                    Dashboard</a>
            </li>
            <li class="divider" data-text="main">Main</li>
            @if (in_array($user_role_id, [1, 2]))
                <!-- Check if user role is Super-Admin, Admin -->
                <li>
                    <a href="#"><i class="bx bxs-inbox icon"></i> Users Management
                        <i class="bx bx-chevron-right icon-right"></i></a>
                    <ul class="side-dropdown">
                        <li><a href="{{ url('/users') }}">Manage User</a></li>
                        <li><a href="{{ url('/roles') }}">Manage User Role</a></li>
                        <li><a href="{{ url('/departments') }}">Manage Department</a></li>
                        <li><a href="{{ url('/permissions') }}">Manage Permissions</a></li>



                    </ul>
                </li>
            @endif

            <li>
                <a href="#"><i class="bx bxs-inbox icon"></i> Inventory Management
                    <i class="bx bx-chevron-right icon-right"></i></a>
                <ul class="side-dropdown">

                    <li><a href="{{ route('products.create') }}">Create Product</a></li>
                    <li><a href="{{ url('/products') }}">Manage Products</a></li>
                    <li><a href="{{ url('/suppliers') }}">Manage Suppliers</a></li>
                    <li><a href="{{ url('/purchases') }}">Manage Purchase</a></li>
                    <li><a href="{{ url('/stocks') }}">Manage Stocks</a></li>
                    <li><a href="{{ url('/stockadjustments') }}">Stock Adjustment </a></li>
                    <li><a href="{{ url('/stockadjustmenttypes') }}">Stock Adjustment Types </a></li>
                    <li><a href="{{ url('/stockadjustmentdetails') }}">Stock Adjustment Details </a></li>
                    <li><a href="{{ url('/categories') }}">Manage Category</a></li>
                    <li><a href="{{ url('/status') }}">Manage Status</a></li>
                    <li><a href="{{ url('/uoms') }}">Manage UOM</a></li>
                    <li><a href="{{ url('/transaction-types') }}">Transaction Types </a></li>

                </ul>
            </li>

            <li>
                <a href="#"><i class="bx bxs-inbox icon"></i> Project Management
                    <i class="bx bx-chevron-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li><a href="{{ route('projects.create') }}">Create Project</a></li>
                    <li><a href="{{ url('/projects') }}">Manage Projects</a></li>
                    <li><a href="{{ url('/tasks') }}">Manage Tasks</a></li>
                    <li><a href="{{ url('/requisitions') }}">Manage Requisition</a></li>

                </ul>
            </li>

            <li class="divider" data-text="Settings">Settings</li>
            <li>
                <a href="#"><i class="bx bxs-notepad icon"></i> Settings
                    <i class="bx bx-chevron-right icon-right"></i></a>
                <ul class="side-dropdown">
                    <li>
                        @if (in_array($user_role_id, [1, 2, 3]))
                            <!-- Check if user role is Super-Admin, Admin, or User -->
                            <a href="{{ route('users.show', session('sess_user_id')) }}"></i>Profile</a>
                        @endif
                    </li>
                    <li>
                        @if (in_array($user_role_id, [1, 2]))
                            <!-- Check if user role is Super-Admin, Admin, or User -->
                            {{-- <li><a href="{{ url('/activity-log') }}">Manage Activity Log</a></li> --}}
                            <a href="{{ url('activity-log') }}"></i>Activity Log</a>
                        @endif
                    </li>
                    <li><a href="{{ url('/logout') }}">Logout</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->

    <!-- NAVBAR -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <button id="toggleSidebar" class="toggle-sidebar">
                <i class="bx bx-menu"></i>
            </button>

            <form action="#">
                <div class="form-group">
                    <input type="text" placeholder="Search..." />
                    <i class="bx bx-search icon"></i>
                </div>
            </form>

            <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                <i class="bx bxs-bell icon"></i>
                <span class="badge">0</span>
            </a>

            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">New Requisition</h5>
                      <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <table id="requisitionsTable" class="table-border">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Requestor Name</th>
                                <th>Needed Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td colspan="3">Loading...</td>
                        </tr>
                    </tbody>
                     </table>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <a href="{{url('/requisitions')}}" class="btn btn-primary">Manage Requisition</a>
                    </div>
                  </div>
                </div>
              </div>

            <a href="#" class="nav-link">
                <i class="bx bxs-message-square-dots icon"></i>
                <span class="badge">8</span>
            </a>
            <span class="divider"></span>
            <div class="profile">
                @if (session('sess_user_id'))
                    <img src="{{ asset(session('sess_user_photo')) }}" alt="User Image">
                @endif
                <ul class="profile-link">
                    <li>


                        @if (in_array($user_role_id, [1, 2, 3]))
                            <!-- Check if user role is Super-Admin, Admin, or User -->
                            <a class='btn btn-primary' href="{{ route('users.show', session('sess_user_id')) }}"><i
                                    class="bx bxs-user-circle icon"></i>Profile</a>
                        @endif


                    </li>
                    <li>
                        <a href="#"><i class="bx bxs-cog"></i> Settings</a>
                    </li>
                    <li>
                        <a href="{{ url('/logout') }}"><i class="bx bxs-log-out-circle"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->

        @yield('page')

        <!-- MAIN -->
    </section>
    <!-- NAVBAR -->

    <!-- <script src="script.js"></script> -->
    <script>
        // SIDEBAR DROPDOWN
        const allDropdown = document.querySelectorAll("#sidebar .side-dropdown");
        const sidebar = document.getElementById("sidebar");

        allDropdown.forEach((item) => {
            const a = item.parentElement.querySelector("a:first-child");
            a.addEventListener("click", function(e) {
                e.preventDefault();

                if (!this.classList.contains("active")) {
                    allDropdown.forEach((i) => {
                        const aLink = i.parentElement.querySelector("a:first-child");

                        aLink.classList.remove("active");
                        i.classList.remove("show");
                    });
                }

                this.classList.toggle("active");
                item.classList.toggle("show");
            });
        });

        // SIDEBAR COLLAPSE
        const toggleSidebar = document.querySelector("nav .toggle-sidebar");
        const allSideDivider = document.querySelectorAll("#sidebar .divider");

        if (sidebar.classList.contains("hide")) {
            allSideDivider.forEach((item) => {
                item.textContent = "-";
            });
            allDropdown.forEach((item) => {
                const a = item.parentElement.querySelector("a:first-child");
                a.classList.remove("active");
                item.classList.remove("show");
            });
        } else {
            allSideDivider.forEach((item) => {
                item.textContent = item.dataset.text;
            });
        }

        toggleSidebar.addEventListener("click", function() {
            sidebar.classList.toggle("hide");

            if (sidebar.classList.contains("hide")) {
                allSideDivider.forEach((item) => {
                    item.textContent = "-";
                });

                allDropdown.forEach((item) => {
                    const a = item.parentElement.querySelector("a:first-child");
                    a.classList.remove("active");
                    item.classList.remove("show");
                });
            } else {
                allSideDivider.forEach((item) => {
                    item.textContent = item.dataset.text;
                });
            }
        });

        sidebar.addEventListener("mouseleave", function() {
            if (this.classList.contains("hide")) {
                allDropdown.forEach((item) => {
                    const a = item.parentElement.querySelector("a:first-child");
                    a.classList.remove("active");
                    item.classList.remove("show");
                });
                allSideDivider.forEach((item) => {
                    item.textContent = "-";
                });
            }
        });

        sidebar.addEventListener("mouseenter", function() {
            if (this.classList.contains("hide")) {
                allDropdown.forEach((item) => {
                    const a = item.parentElement.querySelector("a:first-child");
                    a.classList.remove("active");
                    item.classList.remove("show");
                });
                allSideDivider.forEach((item) => {
                    item.textContent = item.dataset.text;
                });
            }
        });

        // PROFILE DROPDOWN
        const profile = document.querySelector("nav .profile");
        const imgProfile = profile.querySelector("img");
        const dropdownProfile = profile.querySelector(".profile-link");

        imgProfile.addEventListener("click", function() {
            dropdownProfile.classList.toggle("show");
        });

        // // PROGRESSBAR
        // const allProgress = document.querySelectorAll('main .card .progress');

        // allProgress.forEach(item=> {
        // 	item.style.setProperty('--value', item.dataset.value)
        // })

        const toggleSidebarButton = document.getElementById('toggleSidebar');
        const container = document.getElementById('container');

        toggleSidebarButton.addEventListener('click', function() {
            container.classList.toggle('hide-sidebar');
        });


       
    function fetchNewRequisitionsCount() {
        fetch('/new-requisitions-count')
            .then(response => response.json())
            .then(data => {
                document.querySelector('.badge').textContent = data.count;
            })
            .catch(error => console.error('Error fetching requisitions count:', error));
    }

    document.addEventListener('DOMContentLoaded', fetchNewRequisitionsCount);
    setInterval(fetchNewRequisitionsCount, 60000);

    function fetchNewRequisitions() {
        $.ajax({
            url: '/new-requisitions', // Adjust the URL if needed
            method: 'GET',
            success: function(data) {
                var tableBody = $('#requisitionsTable tbody');
                tableBody.empty(); // Clear existing rows
                
                data.forEach(function(requisition, index) {
                    var row = `<tr>
                        <td>${index + 1}</td>
                        <td>${requisition.user.name}</td> <!-- Assuming user has a name field -->
                        <td>${requisition.needed_date}</td>
                    </tr>`;
                    tableBody.append(row);
                });
            },
            error: function(error) {
                console.error('Error fetching requisitions:', error);
            }
        });

    }

    $(document).ready(function() {
        fetchNewRequisitions();
        setInterval(fetchNewRequisitions, 60000); // Refresh every minute
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js') }}/cart.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('assets/jquery/jquery-3.2.1.min.js') }}"></script>
    @yield('script')
</body>

</html>
