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
                    <table>
                        <a href="{{ route('showtr') }}"><button class="btn btn-primary">Kembali ke transaksi</button></a>
                    </table>
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id Produk</th>
                                <th scope="col">Nama Produk</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Sub total</th>
                            </tr>
                        </thead>
                        @foreach ($detail_transactionsModel as $item)
                            <tbody>
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->products_id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>Rp {{ number_format($item->sub_total) }}</td>
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
