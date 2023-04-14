@section('title', 'Transaction')

@extends('layouts.cmsmain')

@section('content')
    <div class="sidebar">
        <div class="logo_details">
            <i class='bx bx-code-alt'></i>
            <div class="logo_name">
                Admin
            </div>
        </div>
        <ul>
            <li>
                <a href="">
                    <i class='bx bxs-truck'></i>
                    <span class="links_name">
                        Products
                    </span>
                </a>
            </li>
            <li>
                <a href="">
                    <i class='bx bx-category'></i>
                    <span class="links_name">
                        Category
                    </span>
                </a>
            </li>
            <li>
                <a href="" class="active">
                    <i class='bx bx-book-open'></i>
                    <span class="links_name">
                        Transaction
                    </span>
                </a>
            </li>
            @auth
                <li class="login">
                    <a href="">
                        <span class="links_name login_out">
                            Log Out
                        </span>
                        <i class='bx bx-log-out' id="log_out"></i>
                    </a>
                </li>
            @endauth
        </ul>
    </div>
    <!-- End Sideber -->
    <section class="home_section">
        <div class="topbar">
            <div class="toggle">
                <i class='bx bx-menu' id="btn"></i>
            </div>
            <div class="user_wrapper">
                {{-- {{ Auth::user()->name }} --}}
            </div>
        </div>

        <!-- End Card Boxs -->
        <div class="details">
            <div class="recent_project">
                <div class="card_header">
                    <h2>Transactions</h2>
                </div>
                <div class="container">
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Tanggal Transaksi</th>
                                <th scope="col">Pembayaran</th>
                                <th scope="col">Total</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        @foreach ($transactionsModel as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>Rp {{ number_format($item->payment) }}</td>
                                    <td>Rp {{ number_format($item->total) }}</td>
                                    <td><a href="/admin/transaction/{{ $item->id }}/details"class="btn btn-warning">Detail
                                            Transaksi</a></td>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </section>

    <script>
        let sidebar = document.querySelector(".sidebar");
        let closeBtn = document.querySelector("#btn");

        closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            // call function
            changeBtn();
        });

        function changeBtn() {
            if (sidebar.classList.contains("open")) {
                closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else {
                closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
            }
        };
    </script>

@endsection
