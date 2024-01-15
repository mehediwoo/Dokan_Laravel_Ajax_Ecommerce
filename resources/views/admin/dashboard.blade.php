@extends('admin.layout.app')
@section('title', $site_title. ' | Dashboard')
@section('content')
<div class="container-fluid">

    <div class="d-sm-flex justify-content-between align-items-center text-capitalize mb-5">
        <h2 class="mb-2 mb-sm-0">dashboard</h2>

        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript: void(0)">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
        </nav>
    </div>

    <!-- Count Cards Start Here -->
    <div class="count-cards mb-5">
        <div class="row g-5 g-lg-4 g-xxl-5">
            <div class="col-sm-6 col-lg-3">
                <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                    <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total users</h5>
                    <h1 class="fw-semibold">44,278</h1>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                    <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total profit</h5>
                    <h1 class="fw-semibold">44,278</h1>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                    <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total expenses</h5>
                    <h1 class="fw-semibold">44,278</h1>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="count-card-single h-100 bg-white p-5 rounded-4 border-s-brand-5">
                    <h5 class="fs-14 text-capitalize fw-normal text-color mb-2">total cost</h5>
                    <h1 class="fw-semibold">44,278</h1>
                </div>
            </div>
        </div>
    </div>
    <!-- Count Cards End Here -->


    <!-- Location and Browser Usage Start Here -->
    <div class="location-browser-usage mb-5">
        <div class="row g-5">
            <div class="col-lg-6">
                <div class="device-location text-color bg-white rounded-4 shadow-lg pb-4">

                    <p class="border-bottom text-capitalize fw-medium px-5 py-5 mb-4">Sales Report by Locations
                        with
                        Devices</p>

                    <div class="table-responsive">
                        <table class="table table-borderless text-capitalize fs-14 align-middle"
                            style="min-width: 40rem">
                            <thead>
                                <tr class="text-uppercase border-bottom">
                                    <th class="p-4 fw-medium">device</th>
                                    <th class="p-4 fw-medium">usa</th>
                                    <th class="p-4 fw-medium">india</th>
                                    <th class="p-4 fw-medium">bahrain</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom">
                                    <td class="p-4">
                                        <span class="d-inline-block">
                                            <span style="background-color: #6c5ffc2b"
                                                class="device-icon brand-color">
                                                <i class="fa-solid fa-mobile-screen"></i>
                                            </span>
                                        </span>
                                        mobile
                                    </td>
                                    <td class="p-4">17%</td>
                                    <td class="p-4">22%</td>
                                    <td class="p-4">11%</td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="p-4">
                                        <span class="d-inline-block">
                                            <span style="background-color: #13bfa62b"
                                                class="device-icon green-color">
                                                <i class="fa-solid fa-display"></i>
                                            </span>
                                        </span>
                                        desktops
                                    </td>
                                    <td class="p-4">34%</td>
                                    <td class="p-4">76%</td>
                                    <td class="p-4">58%</td>
                                </tr>
                                <tr>
                                    <td class="p-4">
                                        <span class="d-inline-block">
                                            <span style="background-color: #e8264624"
                                                class="device-icon red-color">
                                                <i class="fa-solid fa-tablet-screen-button"></i>
                                            </span>
                                        </span>
                                        tablets
                                    </td>
                                    <td class="p-4">56%</td>
                                    <td class="p-4">83%</td>
                                    <td class="p-4">66%</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="device-location text-color bg-white rounded-4 shadow-lg pb-4">

                    <p class="border-bottom text-capitalize fw-medium px-5 py-5 mb-4">browser usage</p>

                    <div class="browser-details">

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-chrome.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>chrome</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold brand-color">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-brand" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-opera.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>opera</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold text-info">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-opera.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>IE</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold text-success">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-firefox.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>firefox</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold red-color">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-red" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-firefox.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>edge</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold text-warning">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-safari.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>safari</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold text-primary">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                        <div class="browser-details-single d-flex align-items-center gap-3 px-5 my-5">
                            <div class="browser-icon">
                                <img src="images/browser-safari.svg" alt="">
                            </div>
                            <div class="browser-details w-100 text-color">
                                <div class="d-flex justify-content-between text-capitalize fs-14 mb-2">
                                    <span>netscape</span>
                                    <span>35,502 <span
                                            class="fs-11 fw-semibold green-color">(12.75%)</span></span>
                                </div>

                                <div class="progress" style="height: .8rem">
                                    <div class="progress-bar bg-green" role="progressbar" style="width: 50%"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Location and Browser Usage Start End -->


    <!-- Product Table Starts Here -->
    <div class="product-table-area">
        <div class="text-color bg-white rounded-4 shadow-lg pb-5">

            <p class="border-bottom text-capitalize fw-medium px-5 py-5 mb-4">product sales</p>

            <div class="px-5">
                <div
                    class="table-product-filter d-sm-flex justify-content-between align-items-center text-color-muted mb-4">
                    <div
                        class="select-product-entries text-nowrap d-flex align-items-center gap-1 mb-4 mb-sm-0">
                        <span>Show</span>
                        <select name="" id="" class="brand-color border p-2 rounded-4">
                            <option value="10" selected>10</option>
                            <option value="20">20</option>
                            <option value="30">30</option>
                            <option value="40">40</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span>entries</span>
                    </div>

                    <form action="">
                        <div class="search-box position-relative fs-3 overflow-hidden">
                            <input class="fs-4 w-100" type="search" name="" id="" placeholder="Search..."
                                style="min-width: 10rem">
                            <button type="submit"
                                class="btn fs-4 position-absolute top-0 end-0 h-100 px-4 pt-3 text-color-2">
                                <i class="fa-solid fa-magnifying-glass w-100 h-100"></i>
                            </button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle fs-14 text-capitalize"
                        style="min-width: 90rem">
                        <thead>
                            <tr class="text-uppercase">
                                <td class="py-3">tracking id</td>
                                <td class="py-3">product</td>
                                <td class="py-3">customer</td>
                                <td class="py-3">date</td>
                                <td class="py-3">amount</td>
                                <td class="py-3">payment method</td>
                                <td class="py-3">status</td>
                                <td class="py-3">action</td>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-completed">shipped</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-2.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-pending">pending</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-3.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-cancelled">cancelled</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-completed">shipped</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-completed">shipped</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-2.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-pending">pending</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-3.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-cancelled">cancelled</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-completed">shipped</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-2.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-pending">pending</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <td class="py-3">#9459454</td>
                                <td class="py-3">
                                    <span class="d-flex align-items-center text-nowrap gap-2">
                                        <img class="rounded-3" src="images/table-product-3.jpg" alt=""
                                            style="width: 3rem; height: 3rem;">

                                        headsets
                                    </span>
                                </td>
                                <td class="py-3">Simon Sais</td>
                                <td class="py-3">05 Jan 2022</td>
                                <td class="py-3">$166.50</td>
                                <td class="py-3">cash on delivery</td>
                                <td class="py-3">
                                    <span class="status-cancelled">cancelled</span>
                                </td>
                                <td class="py-3">
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 brand-color me-3">
                                            <i class="fa-regular fa-pen-to-square"></i>
                                        </span>
                                    </a>
                                    <a href="" class="d-inline-block">
                                        <span class="p-2 red-color">
                                            <i class="fa-regular fa-trash-can"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Table Ends Here -->

</div>
@endsection
