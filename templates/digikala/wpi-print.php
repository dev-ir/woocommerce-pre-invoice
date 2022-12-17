<?php
$DIR = '/templates/digikala/assets/';
do_action('wpi_print_init');
$option = get_option(WPI_OPTIONS);
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
    <meta id="vp" name="viewport" content="width=device-width, initial-scale=1.0">
    <?php do_action('wpi_print_head'); ?>
    <link rel="stylesheet" href="<?php echo WPI_URL . $DIR; ?>/sheet.css" />
</head>

<body>
    <div>
        <div class="h-100 d-flex flex-column bg-000 ai-center">
            <div class="grow-1 bg-000 d-flex flex-column w-100 ai-center shrink-0">
                <div class="grow-1 bg-000 d-flex flex-column w-100 ai-center container-xl-w">
                    <div class="h-full">
                        <!-- <div class="px-4 pb-4 d-flex jc-between ai-center">
                            <div title="" style="width: 113px; height: 30px;">
                                <img class="w-100 d-inline-block lazyloaded" width="75" height="75" alt="" style="object-fit: contain;" src="<?php echo get_option(WPI_OPTIONS)['invoice-logo']; ?>">
                            </div>
                            <div class="d-flex ai-center gap-x-2">
                                <button class="relative d-flex ai-center user-select-none Button-module_btn__daEdK text-button-2 Button-module_btn--medium__7lzYn Button-module_btn--primary__RKxUy radius-medium text-button-1">
                                    <div class="">پرینت / دانلود</div>
                                </button>
                            </div>
                        </div> -->
                        <div class="bg-100 pt-1 overflow-auto hide-scrollbar">
                            <div class="bg-000 p-2 px-0-lg ">
                                <div>
                                    <div class="page">
                                        <h1 style="text-align: center;"> <?php echo $option['invoice-name']; ?></h1>
                                        <table class="header-table w-100">
                                            <tbody>
                                                <tr>
                                                    <td style="width: 1.8cm; height: 2.5cm;vertical-align: middle;padding-bottom: 4px;">
                                                        <div class="header-item-wrapper">
                                                            <div class="portait" style="margin:20px">فروشنده</div>
                                                        </div>
                                                    </td>
                                                    <td style="padding: 0 4px 4px;height: 2cm;">
                                                        <div class="bordered grow header-item-data">
                                                            <table class="grow centered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 7cm"> <span class="label">فروشنده:</span> <?php echo $option['invoice-company_name']; ?> </td>
                                                                        <td style="width: 5cm"> <span class="label">شناسه ملی:</span> <?php echo $option['invoice-natural_id']; ?> </td>
                                                                        <td> <span class="label">شماره ثبت:</span> <?php echo $option['invoice-register_id']; ?> </td>
                                                                        <td> <span class="label">شماره اقتصادی:</span> <?php echo $option['invoice-economical_id']; ?> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td> <span class="label">کدپستی:</span> <?php echo $option['invoice-postal_code']; ?> </td>
                                                                        <td> <span class="label">پست الکترونیکی:</span> <?php echo $option['invoice-email']; ?> </td>
                                                                        <td> <span class="label">تلفن ها:</span> <span><?php echo $option['invoice-mobile']; ?> <?php echo $option['invoice-cellphone']; ?></span> </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"> <span class="label">نشانی شرکت:</span> <?php echo $option['invoice-address']; ?> </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td style="width: 7cm; height: 2cm; padding: 0 4px 4px 0;">
                                                        <div class="bordered" style="text-align: center; height: 100%; padding: 0.4cm 0.2cm;">
                                                            <div class="flex">
                                                                <div class="font-small">شماره فاکتور:</div>
                                                                <div class="flex-grow" style="text-align: left">۸۲۶۶۹۷۹</div>
                                                            </div>
                                                            <div class="flex">
                                                                <div>تاریخ:</div>
                                                                <div class="flex-grow" style="text-align: left"><?php echo date_i18n( get_option( 'date_format' ), strtotime( 'now' ) ); ?></div>
                                                            </div>
                                                            <div class="flex" style="margin-bottom: 4px;">
                                                                <div>پیگیری:</div>
                                                                <div class="flex-grow font-medium" style="text-align: left">۱۷۵۱۸۴۹۴۷</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width: 1.8cm; height: 2cm;vertical-align: center; padding: 0 0 4px">
                                                        <div class="header-item-wrapper">
                                                            <div class="portait" style="margin: 20px">خریدار</div>
                                                        </div>
                                                    </td>
                                                    <td style="height: 2cm;vertical-align: center; padding: 0 4px 4px">
                                                        <div class="bordered header-item-data">
                                                            <table style="height: 100%" class="centered">
                                                                <tbody>
                                                                    <tr>
                                                                        <td style="width: 6.7cm"> <span class="label">خریدار:</span> مهدی ابراهیمی </td>
                                                                        <td style="width: 6.7cm"> <span class="label">شماره&zwnj;اقتصادی / شماره&zwnj;ملی:</span> ۰۰۱۷۶۹۸۵۴۵ </td>
                                                                        <td> <span class="label">شناسه ملی:</span> ۰۰۱۷۶۹۸۵۴۵ </td>
                                                                        <td> <span class="label">شماره ثبت:</span> - </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="4"> <span class="label">نشانی:</span> خیابان هفده شهریور- خیابان مختاری– پلاک ۱۶- انبار دیجی کالا </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td colspan="2"> <span class="label">شماره تماس:</span> ۰۲۱۳۳۶۸۲۴۳۱ </td>
                                                                        <td colspan="2"> <span class="label">کد پستی:</span> ۱۱۱۱۱۱۱۱۱۱ </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                    <td style="width: 7cm;padding: 0 4px 4px 0;">
                                                        <div class="bordered" style="text-align: center; height: 100%;">
                                                            <div class="flex" style="margin-bottom: 4px;">
                                                                <div>شماره مالیاتی:</div>
                                                                <div class="flex-grow font-medium" style="text-align: left">KGWNG۰۴B۴۲۷E۲۴E۳۲۲</div>
                                                            </div>
                                                            <div class="flex" style="margin-bottom: 4px;">
                                                                <div>سریال حافظه مالیاتی:</div>
                                                                <div class="flex-grow font-medium" style="text-align: left">S۰۵۴۰۰۱۰۰۰۰۰۰۱۰۰</div>
                                                            </div>
                                                            <div class="flex" style="margin-bottom: 4px;">
                                                                <div>سریال پایانه فروشگاهی:</div>
                                                                <div class="flex-grow font-medium" style="text-align: left">A۰۵۴۰۰۱۰۰۰۰۰۰۱۹۰</div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <table class="content-table">
                                            <thead>
                                                <tr>
                                                    <th>ردیف</th>
                                                    <th>شناسه کالا یا خدمت</th>
                                                    <th style="width: 30%" colspan="2.3">شرح کالا یا خدمت</th>
                                                    <th>تعداد</th>
                                                    <th style="width: 2.3cm">مبلغ واحد (ریال)</th>
                                                    <th style="width: 2.3cm">مبلغ کل (ریال)</th>
                                                    <th style="width: 2.3cm">تخفیف (ریال)</th>
                                                    <th style="width: 2.3cm">مبلغ کل پس از تخفیف (ریال)</th>
                                                    <th style="width: 2.3cm">جمع مالیات و عوارض ارزش افزوده (ریال)</th>
                                                    <th style="width: 2.5cm"> جمع کل پس از تخفیف و مالیات و عوارض (ریال)</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>۱</td>
                                                    <td> ۱۰۰ </td>
                                                    <td colspan="2">
                                                        <div class="title">درآمد ارسال و بیمه حمل</div>
                                                    </td>
                                                    <td>۱</td>
                                                    <td><span class="ltr">۱۰۰,۰۰۰</span></td>
                                                    <td><span class="ltr">۱۰۰,۰۰۰</span></td>
                                                    <td><span class="ltr">۰</span></td>
                                                    <td> <span class="ltr">۱۰۰,۰۰۰</span> </td>
                                                    <td><span class="ltr">۰</span></td>
                                                    <td><span class="ltr">۱۰۰,۰۰۰</span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"> <b>جمع کل</b> </td>
                                                    <td>۱</td>
                                                    <td><span class="ltr">۱۰۰,۰۰۰</span></td>
                                                    <td><span class="ltr">۱۰۰,۰۰۰</span></td>
                                                    <td> <span class="ltr">۰</span> </td>
                                                    <td> <span class="ltr"> ۱۰۰,۰۰۰ </span> </td>
                                                    <td><span class="ltr">۰</span></td>
                                                    <td> <span class="ltr"> ۱۰۰,۰۰۰ </span> </td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="6"> </td>
                                                    <td colspan="4" class="font-small"> جمع کل پس از کسر تخفیف با احتساب مالیات و عوارض (ریال): </td>
                                                    <td><span class="ltr"> ۱۰۰,۰۰۰ </span></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="4"> اعتبار مالیاتی قابل استفاده توسط خریدار </td>
                                                    <td colspan="7" class="font-small"> </td>
                                                </tr>
                                                <tr style="background: #fff">
                                                    <td colspan="11" style="height: 2.5cm;vertical-align: top">
                                                        <div class="flex">
                                                            <div class="flex-grow">مهر و امضای فروشنده:</div>
                                                            <div class="flex-grow">تاریخ تحویل:</div>
                                                            <div class="flex-grow">ساعت تحویل:</div>
                                                            <div class="flex-grow">روش&zwnj;های پرداخت:</div>
                                                            <div class="flex-grow">مهر و امضای خریدار:</div>
                                                            <div class="flex-grow" style="width: 1.8cm"></div>
                                                        </div>
                                                        <div class="flex">
                                                            <div class="flex-grow"> <img class="footer-img uk-align-center" width="150px" src="https://api.digikala.com/static/files/acb0d08c.jpg"> </div>
                                                            <div class="flex-grow">۱۱ مهر ۱۴۰۱</div>
                                                            <div class="flex-grow">۱۰ - ۱۸</div>
                                                            <div class="flex-grow">
                                                                <ul>
                                                                    <li style="text-align: right"> اعتباری : ۳,۱۰۰,۰۰۰ </li>
                                                                </ul>
                                                            </div>
                                                            <div class="flex-grow"></div>
                                                            <div style="display: flex; align-items: center; justify-content: center; margin-top: 4px; margin-left: 10px;"> <img class="footer-img uk-align-center" style="width: 1.5cm; margin-left: 4px;" src="https://api.digikala.com/static/files/40417d6f.jpg"> <span style="width: 2cm;"> <svg xmlns="http://www.w3.org/2000/svg" class="qr-svg " style="width: 100%; height: auto;" viewBox="0 0 49 49">
                                                                        <defs>
                                                                            <style>
                                                                                rect {
                                                                                    shape-rendering: crispEdges
                                                                                }
                                                                            </style>
                                                                        </defs>
                                                                        <path class="qr-4 " stroke="transparent" fill="#fff" fill-opacity="1" d="M11 0 h1 v1 h-1Z M14 0 h1 v1 h-1Z M18 0 h1 v1 h-1Z M20 0 h1 v1 h-1Z M22 0 h1 v1 h-1Z M24 0 h1 v1 h-1Z M28 0 h2 v1 h-2Z M31 0 h1 v1 h-1Z M33 0 h3 v1 h-3Z M9 1 h1 v1 h-1Z M11 1 h1 v1 h-1Z M14 1 h5 v1 h-5Z M20 1 h1 v1 h-1Z M23 1 h1 v1 h-1Z M25 1 h1 v1 h-1Z M27 1 h2 v1 h-2Z M33 1 h3 v1 h-3Z M37 1 h1 v1 h-1Z M9 2 h1 v1 h-1Z M11 2 h2 v1 h-2Z M14 2 h3 v1 h-3Z M18 2 h1 v1 h-1Z M21 2 h4 v1 h-4Z M28 2 h1 v1 h-1Z M31 2 h1 v1 h-1Z M34 2 h1 v1 h-1Z M36 2 h2 v1 h-2Z M14 3 h1 v1 h-1Z M17 3 h1 v1 h-1Z M20 3 h3 v1 h-3Z M24 3 h5 v1 h-5Z M32 3 h1 v1 h-1Z M36 3 h1 v1 h-1Z M9 4 h4 v1 h-4Z M14 4 h1 v1 h-1Z M17 4 h1 v1 h-1Z M29 4 h3 v1 h-3Z M33 4 h1 v1 h-1Z M37 4 h1 v1 h-1Z M9 5 h2 v1 h-2Z M15 5 h2 v1 h-2Z M18 5 h2 v1 h-2Z M28 5 h2 v1 h-2Z M34 5 h4 v1 h-4Z M12 7 h2 v1 h-2Z M15 7 h1 v1 h-1Z M17 7 h1 v1 h-1Z M19 7 h2 v1 h-2Z M28 7 h2 v1 h-2Z M31 7 h2 v1 h-2Z M34 7 h1 v1 h-1Z M37 7 h4 v1 h-4Z M9 8 h1 v1 h-1Z M11 8 h1 v1 h-1Z M18 8 h4 v1 h-4Z M27 8 h1 v1 h-1Z M31 8 h1 v1 h-1Z M33 8 h1 v1 h-1Z M38 8 h1 v1 h-1Z M0 9 h1 v1 h-1Z M3 9 h2 v1 h-2Z M7 9 h3 v1 h-3Z M12 9 h4 v1 h-4Z M18 9 h1 v1 h-1Z M20 9 h1 v1 h-1Z M25 9 h1 v1 h-1Z M28 9 h1 v1 h-1Z M30 9 h1 v1 h-1Z M32 9 h1 v1 h-1Z M34 9 h1 v1 h-1Z M36 9 h1 v1 h-1Z M40 9 h1 v1 h-1Z M47 9 h1 v1 h-1Z M0 10 h1 v1 h-1Z M7 10 h1 v1 h-1Z M9 10 h1 v1 h-1Z M13 10 h5 v1 h-5Z M19 10 h1 v1 h-1Z M21 10 h1 v1 h-1Z M24 10 h2 v1 h-2Z M28 10 h1 v1 h-1Z M32 10 h3 v1 h-3Z M39 10 h2 v1 h-2Z M42 10 h1 v1 h-1Z M44 10 h1 v1 h-1Z M47 10 h2 v1 h-2Z M2 11 h2 v1 h-2Z M7 11 h5 v1 h-5Z M13 11 h2 v1 h-2Z M18 11 h1 v1 h-1Z M20 11 h1 v1 h-1Z M22 11 h1 v1 h-1Z M24 11 h4 v1 h-4Z M32 11 h1 v1 h-1Z M34 11 h3 v1 h-3Z M39 11 h1 v1 h-1Z M42 11 h1 v1 h-1Z M45 11 h4 v1 h-4Z M1 12 h2 v1 h-2Z M5 12 h1 v1 h-1Z M7 12 h10 v1 h-10Z M18 12 h1 v1 h-1Z M21 12 h2 v1 h-2Z M25 12 h1 v1 h-1Z M32 12 h1 v1 h-1Z M34 12 h1 v1 h-1Z M36 12 h2 v1 h-2Z M39 12 h1 v1 h-1Z M42 12 h1 v1 h-1Z M46 12 h2 v1 h-2Z M1 13 h1 v1 h-1Z M3 13 h2 v1 h-2Z M7 13 h2 v1 h-2Z M10 13 h1 v1 h-1Z M12 13 h1 v1 h-1Z M14 13 h4 v1 h-4Z M19 13 h2 v1 h-2Z M23 13 h1 v1 h-1Z M26 13 h1 v1 h-1Z M31 13 h4 v1 h-4Z M36 13 h5 v1 h-5Z M45 13 h3 v1 h-3Z M2 14 h1 v1 h-1Z M4 14 h1 v1 h-1Z M8 14 h2 v1 h-2Z M11 14 h6 v1 h-6Z M19 14 h1 v1 h-1Z M22 14 h1 v1 h-1Z M26 14 h2 v1 h-2Z M29 14 h4 v1 h-4Z M37 14 h1 v1 h-1Z M39 14 h1 v1 h-1Z M42 14 h2 v1 h-2Z M3 15 h2 v1 h-2Z M7 15 h1 v1 h-1Z M9 15 h1 v1 h-1Z M12 15 h1 v1 h-1Z M17 15 h2 v1 h-2Z M21 15 h2 v1 h-2Z M26 15 h1 v1 h-1Z M29 15 h1 v1 h-1Z M31 15 h6 v1 h-6Z M38 15 h1 v1 h-1Z M40 15 h3 v1 h-3Z M44 15 h1 v1 h-1Z M48 15 h1 v1 h-1Z M0 16 h1 v1 h-1Z M2 16 h1 v1 h-1Z M9 16 h2 v1 h-2Z M12 16 h1 v1 h-1Z M16 16 h2 v1 h-2Z M19 16 h1 v1 h-1Z M21 16 h5 v1 h-5Z M29 16 h5 v1 h-5Z M37 16 h1 v1 h-1Z M40 16 h1 v1 h-1Z M45 16 h3 v1 h-3Z M4 17 h2 v1 h-2Z M8 17 h2 v1 h-2Z M11 17 h2 v1 h-2Z M14 17 h1 v1 h-1Z M17 17 h3 v1 h-3Z M23 17 h5 v1 h-5Z M30 17 h1 v1 h-1Z M32 17 h1 v1 h-1Z M35 17 h1 v1 h-1Z M42 17 h1 v1 h-1Z M44 17 h3 v1 h-3Z M3 18 h3 v1 h-3Z M7 18 h1 v1 h-1Z M13 18 h2 v1 h-2Z M17 18 h1 v1 h-1Z M19 18 h1 v1 h-1Z M21 18 h1 v1 h-1Z M24 18 h2 v1 h-2Z M27 18 h2 v1 h-2Z M30 18 h1 v1 h-1Z M35 18 h1 v1 h-1Z M37 18 h3 v1 h-3Z M42 18 h2 v1 h-2Z M45 18 h4 v1 h-4Z M0 19 h3 v1 h-3Z M4 19 h1 v1 h-1Z M7 19 h2 v1 h-2Z M12 19 h1 v1 h-1Z M17 19 h1 v1 h-1Z M19 19 h1 v1 h-1Z M22 19 h2 v1 h-2Z M28 19 h1 v1 h-1Z M30 19 h1 v1 h-1Z M33 19 h1 v1 h-1Z M35 19 h2 v1 h-2Z M38 19 h1 v1 h-1Z M40 19 h1 v1 h-1Z M43 19 h1 v1 h-1Z M45 19 h2 v1 h-2Z M48 19 h1 v1 h-1Z M1 20 h5 v1 h-5Z M7 20 h3 v1 h-3Z M11 20 h1 v1 h-1Z M13 20 h1 v1 h-1Z M16 20 h2 v1 h-2Z M20 20 h1 v1 h-1Z M22 20 h3 v1 h-3Z M26 20 h3 v1 h-3Z M30 20 h2 v1 h-2Z M34 20 h1 v1 h-1Z M38 20 h2 v1 h-2Z M42 20 h2 v1 h-2Z M45 20 h2 v1 h-2Z M48 20 h1 v1 h-1Z M0 21 h2 v1 h-2Z M4 21 h2 v1 h-2Z M10 21 h7 v1 h-7Z M19 21 h2 v1 h-2Z M22 21 h1 v1 h-1Z M24 21 h3 v1 h-3Z M28 21 h3 v1 h-3Z M32 21 h2 v1 h-2Z M37 21 h4 v1 h-4Z M46 21 h2 v1 h-2Z M11 22 h2 v1 h-2Z M14 22 h2 v1 h-2Z M18 22 h1 v1 h-1Z M27 22 h1 v1 h-1Z M29 22 h1 v1 h-1Z M31 22 h3 v1 h-3Z M35 22 h1 v1 h-1Z M37 22 h1 v1 h-1Z M46 22 h1 v1 h-1Z M0 23 h1 v1 h-1Z M3 23 h1 v1 h-1Z M10 23 h1 v1 h-1Z M12 23 h1 v1 h-1Z M14 23 h7 v1 h-7Z M27 23 h1 v1 h-1Z M29 23 h1 v1 h-1Z M31 23 h3 v1 h-3Z M35 23 h4 v1 h-4Z M45 23 h1 v1 h-1Z M48 23 h1 v1 h-1Z M0 24 h4 v1 h-4Z M9 24 h2 v1 h-2Z M12 24 h1 v1 h-1Z M14 24 h8 v1 h-8Z M29 24 h1 v1 h-1Z M31 24 h1 v1 h-1Z M33 24 h6 v1 h-6Z M45 24 h1 v1 h-1Z M47 24 h1 v1 h-1Z M10 25 h1 v1 h-1Z M13 25 h3 v1 h-3Z M18 25 h1 v1 h-1Z M20 25 h2 v1 h-2Z M30 25 h2 v1 h-2Z M34 25 h2 v1 h-2Z M38 25 h2 v1 h-2Z M45 25 h2 v1 h-2Z M48 25 h1 v1 h-1Z M1 26 h2 v1 h-2Z M9 26 h2 v1 h-2Z M13 26 h1 v1 h-1Z M15 26 h4 v1 h-4Z M20 26 h2 v1 h-2Z M27 26 h1 v1 h-1Z M32 26 h3 v1 h-3Z M47 26 h2 v1 h-2Z M5 27 h1 v1 h-1Z M9 27 h1 v1 h-1Z M13 27 h1 v1 h-1Z M15 27 h1 v1 h-1Z M17 27 h3 v1 h-3Z M25 27 h2 v1 h-2Z M28 27 h1 v1 h-1Z M32 27 h1 v1 h-1Z M34 27 h1 v1 h-1Z M38 27 h2 v1 h-2Z M45 27 h4 v1 h-4Z M0 28 h1 v1 h-1Z M4 28 h1 v1 h-1Z M8 28 h4 v1 h-4Z M15 28 h1 v1 h-1Z M17 28 h3 v1 h-3Z M21 28 h3 v1 h-3Z M26 28 h1 v1 h-1Z M28 28 h1 v1 h-1Z M31 28 h1 v1 h-1Z M33 28 h3 v1 h-3Z M39 28 h3 v1 h-3Z M43 28 h1 v1 h-1Z M45 28 h2 v1 h-2Z M48 28 h1 v1 h-1Z M0 29 h3 v1 h-3Z M5 29 h1 v1 h-1Z M11 29 h1 v1 h-1Z M13 29 h1 v1 h-1Z M15 29 h1 v1 h-1Z M18 29 h1 v1 h-1Z M24 29 h1 v1 h-1Z M28 29 h8 v1 h-8Z M38 29 h3 v1 h-3Z M43 29 h5 v1 h-5Z M0 30 h2 v1 h-2Z M5 30 h1 v1 h-1Z M7 30 h2 v1 h-2Z M10 30 h1 v1 h-1Z M12 30 h2 v1 h-2Z M15 30 h1 v1 h-1Z M17 30 h2 v1 h-2Z M20 30 h1 v1 h-1Z M25 30 h1 v1 h-1Z M27 30 h1 v1 h-1Z M29 30 h3 v1 h-3Z M34 30 h1 v1 h-1Z M38 30 h6 v1 h-6Z M45 30 h2 v1 h-2Z M1 31 h3 v1 h-3Z M5 31 h1 v1 h-1Z M7 31 h1 v1 h-1Z M12 31 h1 v1 h-1Z M15 31 h3 v1 h-3Z M19 31 h2 v1 h-2Z M23 31 h1 v1 h-1Z M27 31 h1 v1 h-1Z M30 31 h1 v1 h-1Z M32 31 h1 v1 h-1Z M38 31 h1 v1 h-1Z M40 31 h3 v1 h-3Z M44 31 h1 v1 h-1Z M47 31 h2 v1 h-2Z M2 32 h1 v1 h-1Z M5 32 h1 v1 h-1Z M7 32 h1 v1 h-1Z M11 32 h1 v1 h-1Z M15 32 h3 v1 h-3Z M21 32 h8 v1 h-8Z M34 32 h1 v1 h-1Z M39 32 h2 v1 h-2Z M43 32 h1 v1 h-1Z M45 32 h1 v1 h-1Z M48 32 h1 v1 h-1Z M2 33 h1 v1 h-1Z M5 33 h1 v1 h-1Z M9 33 h7 v1 h-7Z M17 33 h3 v1 h-3Z M21 33 h1 v1 h-1Z M23 33 h2 v1 h-2Z M28 33 h2 v1 h-2Z M31 33 h1 v1 h-1Z M33 33 h3 v1 h-3Z M39 33 h1 v1 h-1Z M41 33 h1 v1 h-1Z M47 33 h1 v1 h-1Z M0 34 h2 v1 h-2Z M3 34 h1 v1 h-1Z M7 34 h2 v1 h-2Z M11 34 h3 v1 h-3Z M15 34 h6 v1 h-6Z M24 34 h3 v1 h-3Z M29 34 h5 v1 h-5Z M36 34 h1 v1 h-1Z M39 34 h1 v1 h-1Z M41 34 h2 v1 h-2Z M44 34 h5 v1 h-5Z M1 35 h2 v1 h-2Z M4 35 h2 v1 h-2Z M10 35 h2 v1 h-2Z M14 35 h1 v1 h-1Z M16 35 h1 v1 h-1Z M18 35 h1 v1 h-1Z M20 35 h5 v1 h-5Z M26 35 h3 v1 h-3Z M31 35 h1 v1 h-1Z M34 35 h1 v1 h-1Z M36 35 h2 v1 h-2Z M39 35 h1 v1 h-1Z M41 35 h1 v1 h-1Z M43 35 h4 v1 h-4Z M48 35 h1 v1 h-1Z M0 36 h3 v1 h-3Z M5 36 h1 v1 h-1Z M7 36 h2 v1 h-2Z M14 36 h2 v1 h-2Z M19 36 h1 v1 h-1Z M23 36 h2 v1 h-2Z M29 36 h1 v1 h-1Z M32 36 h2 v1 h-2Z M36 36 h2 v1 h-2Z M39 36 h5 v1 h-5Z M46 36 h2 v1 h-2Z M0 37 h2 v1 h-2Z M7 37 h1 v1 h-1Z M11 37 h2 v1 h-2Z M14 37 h2 v1 h-2Z M17 37 h1 v1 h-1Z M21 37 h1 v1 h-1Z M25 37 h2 v1 h-2Z M31 37 h3 v1 h-3Z M37 37 h1 v1 h-1Z M40 37 h1 v1 h-1Z M42 37 h1 v1 h-1Z M44 37 h4 v1 h-4Z M8 38 h5 v1 h-5Z M18 38 h1 v1 h-1Z M21 38 h1 v1 h-1Z M23 38 h2 v1 h-2Z M28 38 h1 v1 h-1Z M30 38 h1 v1 h-1Z M32 38 h2 v1 h-2Z M36 38 h2 v1 h-2Z M39 38 h1 v1 h-1Z M43 38 h1 v1 h-1Z M48 38 h1 v1 h-1Z M7 39 h3 v1 h-3Z M11 39 h3 v1 h-3Z M15 39 h1 v1 h-1Z M21 39 h4 v1 h-4Z M27 39 h2 v1 h-2Z M35 39 h2 v1 h-2Z M38 39 h1 v1 h-1Z M40 39 h1 v1 h-1Z M42 39 h1 v1 h-1Z M45 39 h1 v1 h-1Z M7 40 h1 v1 h-1Z M11 40 h2 v1 h-2Z M15 40 h1 v1 h-1Z M18 40 h1 v1 h-1Z M20 40 h2 v1 h-2Z M28 40 h2 v1 h-2Z M31 40 h2 v1 h-2Z M38 40 h1 v1 h-1Z M46 40 h1 v1 h-1Z M48 40 h1 v1 h-1Z M9 41 h2 v1 h-2Z M12 41 h5 v1 h-5Z M20 41 h2 v1 h-2Z M27 41 h4 v1 h-4Z M33 41 h2 v1 h-2Z M36 41 h2 v1 h-2Z M39 41 h1 v1 h-1Z M46 41 h3 v1 h-3Z M10 42 h1 v1 h-1Z M12 42 h4 v1 h-4Z M18 42 h1 v1 h-1Z M27 42 h1 v1 h-1Z M31 42 h1 v1 h-1Z M33 42 h3 v1 h-3Z M37 42 h3 v1 h-3Z M45 42 h1 v1 h-1Z M48 42 h1 v1 h-1Z M9 43 h1 v1 h-1Z M11 43 h4 v1 h-4Z M16 43 h2 v1 h-2Z M20 43 h2 v1 h-2Z M30 43 h1 v1 h-1Z M32 43 h1 v1 h-1Z M34 43 h1 v1 h-1Z M37 43 h1 v1 h-1Z M9 44 h1 v1 h-1Z M12 44 h1 v1 h-1Z M15 44 h4 v1 h-4Z M21 44 h1 v1 h-1Z M27 44 h2 v1 h-2Z M35 44 h3 v1 h-3Z M39 44 h1 v1 h-1Z M45 44 h1 v1 h-1Z M47 44 h1 v1 h-1Z M10 45 h1 v1 h-1Z M12 45 h1 v1 h-1Z M15 45 h1 v1 h-1Z M19 45 h3 v1 h-3Z M28 45 h1 v1 h-1Z M30 45 h1 v1 h-1Z M32 45 h2 v1 h-2Z M36 45 h3 v1 h-3Z M41 45 h1 v1 h-1Z M43 45 h1 v1 h-1Z M47 45 h1 v1 h-1Z M9 46 h1 v1 h-1Z M12 46 h1 v1 h-1Z M14 46 h1 v1 h-1Z M19 46 h1 v1 h-1Z M22 46 h1 v1 h-1Z M24 46 h1 v1 h-1Z M26 46 h2 v1 h-2Z M31 46 h1 v1 h-1Z M34 46 h2 v1 h-2Z M39 46 h1 v1 h-1Z M41 46 h2 v1 h-2Z M45 46 h1 v1 h-1Z M47 46 h2 v1 h-2Z M9 47 h1 v1 h-1Z M12 47 h1 v1 h-1Z M14 47 h2 v1 h-2Z M17 47 h1 v1 h-1Z M22 47 h2 v1 h-2Z M25 47 h2 v1 h-2Z M29 47 h1 v1 h-1Z M31 47 h5 v1 h-5Z M38 47 h1 v1 h-1Z M41 47 h1 v1 h-1Z M43 47 h1 v1 h-1Z M45 47 h4 v1 h-4Z M9 48 h1 v1 h-1Z M14 48 h1 v1 h-1Z M19 48 h2 v1 h-2Z M24 48 h2 v1 h-2Z M29 48 h5 v1 h-5Z M35 48 h1 v1 h-1Z M37 48 h1 v1 h-1Z M39 48 h2 v1 h-2Z M42 48 h2 v1 h-2Z M45 48 h3 v1 h-3Z "></path>
                                                                        <path class="qr-6 " stroke="transparent" fill="#fff" fill-opacity="1" d="M1 1 h5 v1 h-5Z M43 1 h5 v1 h-5Z M1 2 h1 v1 h-1Z M5 2 h1 v1 h-1Z M43 2 h1 v1 h-1Z M47 2 h1 v1 h-1Z M1 3 h1 v1 h-1Z M5 3 h1 v1 h-1Z M43 3 h1 v1 h-1Z M47 3 h1 v1 h-1Z M1 4 h1 v1 h-1Z M5 4 h1 v1 h-1Z M43 4 h1 v1 h-1Z M47 4 h1 v1 h-1Z M1 5 h5 v1 h-5Z M43 5 h5 v1 h-5Z M1 43 h5 v1 h-5Z M1 44 h1 v1 h-1Z M5 44 h1 v1 h-1Z M1 45 h1 v1 h-1Z M5 45 h1 v1 h-1Z M1 46 h1 v1 h-1Z M5 46 h1 v1 h-1Z M1 47 h5 v1 h-5Z "></path>
                                                                        <path class="qr-8 " stroke="transparent" fill="#fff" fill-opacity="1" d="M7 0 h1 v1 h-1Z M41 0 h1 v1 h-1Z M7 1 h1 v1 h-1Z M41 1 h1 v1 h-1Z M7 2 h1 v1 h-1Z M41 2 h1 v1 h-1Z M7 3 h1 v1 h-1Z M41 3 h1 v1 h-1Z M7 4 h1 v1 h-1Z M41 4 h1 v1 h-1Z M7 5 h1 v1 h-1Z M41 5 h1 v1 h-1Z M7 6 h1 v1 h-1Z M41 6 h1 v1 h-1Z M0 7 h8 v1 h-8Z M41 7 h8 v1 h-8Z M0 41 h8 v1 h-8Z M7 42 h1 v1 h-1Z M7 43 h1 v1 h-1Z M7 44 h1 v1 h-1Z M7 45 h1 v1 h-1Z M7 46 h1 v1 h-1Z M7 47 h1 v1 h-1Z M7 48 h1 v1 h-1Z "></path>
                                                                        <path class="qr-10 " stroke="transparent" fill="#fff" fill-opacity="1" d="M23 5 h3 v1 h-3Z M23 6 h1 v1 h-1Z M25 6 h1 v1 h-1Z M23 7 h3 v1 h-3Z M5 23 h3 v1 h-3Z M23 23 h3 v1 h-3Z M41 23 h3 v1 h-3Z M5 24 h1 v1 h-1Z M7 24 h1 v1 h-1Z M23 24 h1 v1 h-1Z M25 24 h1 v1 h-1Z M41 24 h1 v1 h-1Z M43 24 h1 v1 h-1Z M5 25 h3 v1 h-3Z M23 25 h3 v1 h-3Z M41 25 h3 v1 h-3Z M23 41 h3 v1 h-3Z M41 41 h3 v1 h-3Z M23 42 h1 v1 h-1Z M25 42 h1 v1 h-1Z M41 42 h1 v1 h-1Z M43 42 h1 v1 h-1Z M23 43 h3 v1 h-3Z M41 43 h3 v1 h-3Z "></path>
                                                                        <path class="qr-12 " stroke="transparent" fill="#fff" fill-opacity="1" d="M9 6 h1 v1 h-1Z M11 6 h1 v1 h-1Z M13 6 h1 v1 h-1Z M15 6 h1 v1 h-1Z M17 6 h1 v1 h-1Z M19 6 h1 v1 h-1Z M21 6 h1 v1 h-1Z M27 6 h1 v1 h-1Z M29 6 h1 v1 h-1Z M31 6 h1 v1 h-1Z M33 6 h1 v1 h-1Z M35 6 h1 v1 h-1Z M37 6 h1 v1 h-1Z M39 6 h1 v1 h-1Z M6 9 h1 v1 h-1Z M6 11 h1 v1 h-1Z M6 13 h1 v1 h-1Z M6 15 h1 v1 h-1Z M6 17 h1 v1 h-1Z M6 19 h1 v1 h-1Z M6 21 h1 v1 h-1Z M6 27 h1 v1 h-1Z M6 29 h1 v1 h-1Z M6 31 h1 v1 h-1Z M6 33 h1 v1 h-1Z M6 35 h1 v1 h-1Z M6 37 h1 v1 h-1Z M6 39 h1 v1 h-1Z "></path>
                                                                        <path class="qr-14 " stroke="transparent" fill="#fff" fill-opacity="1" d="M8 1 h1 v1 h-1Z M8 2 h1 v1 h-1Z M1 8 h3 v1 h-3Z M5 8 h1 v1 h-1Z M46 8 h2 v1 h-2Z M8 43 h1 v1 h-1Z M8 45 h1 v1 h-1Z M8 46 h1 v1 h-1Z M8 47 h1 v1 h-1Z "></path>
                                                                        <path class="qr-16 " stroke="transparent" fill="#fff" fill-opacity="1" d="M38 0 h2 v1 h-2Z M38 2 h1 v1 h-1Z M38 3 h1 v1 h-1Z M40 3 h1 v1 h-1Z M38 4 h3 v1 h-3Z M39 5 h2 v1 h-2Z M0 38 h1 v1 h-1Z M2 38 h3 v1 h-3Z M0 39 h1 v1 h-1Z M4 39 h2 v1 h-2Z M3 40 h3 v1 h-3Z "></path>
                                                                        <path class="qr-512 " stroke="transparent" fill="#000" fill-opacity="1" d="M8 41 h1 v1 h-1Z "></path>
                                                                        <path class="qr-1024 " stroke="transparent" fill="#000" fill-opacity="1" d="M9 0 h2 v1 h-2Z M12 0 h2 v1 h-2Z M15 0 h3 v1 h-3Z M19 0 h1 v1 h-1Z M21 0 h1 v1 h-1Z M23 0 h1 v1 h-1Z M25 0 h3 v1 h-3Z M30 0 h1 v1 h-1Z M32 0 h1 v1 h-1Z M36 0 h2 v1 h-2Z M10 1 h1 v1 h-1Z M12 1 h2 v1 h-2Z M19 1 h1 v1 h-1Z M21 1 h2 v1 h-2Z M24 1 h1 v1 h-1Z M26 1 h1 v1 h-1Z M29 1 h4 v1 h-4Z M36 1 h1 v1 h-1Z M10 2 h1 v1 h-1Z M13 2 h1 v1 h-1Z M17 2 h1 v1 h-1Z M19 2 h2 v1 h-2Z M25 2 h3 v1 h-3Z M29 2 h2 v1 h-2Z M32 2 h2 v1 h-2Z M35 2 h1 v1 h-1Z M9 3 h5 v1 h-5Z M15 3 h2 v1 h-2Z M18 3 h2 v1 h-2Z M23 3 h1 v1 h-1Z M29 3 h3 v1 h-3Z M33 3 h3 v1 h-3Z M37 3 h1 v1 h-1Z M13 4 h1 v1 h-1Z M15 4 h2 v1 h-2Z M18 4 h4 v1 h-4Z M27 4 h2 v1 h-2Z M32 4 h1 v1 h-1Z M34 4 h3 v1 h-3Z M11 5 h4 v1 h-4Z M17 5 h1 v1 h-1Z M20 5 h2 v1 h-2Z M27 5 h1 v1 h-1Z M30 5 h4 v1 h-4Z M9 7 h3 v1 h-3Z M14 7 h1 v1 h-1Z M16 7 h1 v1 h-1Z M18 7 h1 v1 h-1Z M21 7 h1 v1 h-1Z M27 7 h1 v1 h-1Z M30 7 h1 v1 h-1Z M33 7 h1 v1 h-1Z M35 7 h2 v1 h-2Z M10 8 h1 v1 h-1Z M12 8 h6 v1 h-6Z M28 8 h3 v1 h-3Z M32 8 h1 v1 h-1Z M34 8 h4 v1 h-4Z M39 8 h2 v1 h-2Z M1 9 h2 v1 h-2Z M5 9 h1 v1 h-1Z M10 9 h2 v1 h-2Z M16 9 h2 v1 h-2Z M19 9 h1 v1 h-1Z M21 9 h4 v1 h-4Z M26 9 h2 v1 h-2Z M29 9 h1 v1 h-1Z M31 9 h1 v1 h-1Z M33 9 h1 v1 h-1Z M35 9 h1 v1 h-1Z M37 9 h3 v1 h-3Z M41 9 h6 v1 h-6Z M48 9 h1 v1 h-1Z M1 10 h5 v1 h-5Z M8 10 h1 v1 h-1Z M10 10 h3 v1 h-3Z M18 10 h1 v1 h-1Z M20 10 h1 v1 h-1Z M22 10 h2 v1 h-2Z M26 10 h2 v1 h-2Z M29 10 h3 v1 h-3Z M35 10 h4 v1 h-4Z M41 10 h1 v1 h-1Z M43 10 h1 v1 h-1Z M45 10 h2 v1 h-2Z M0 11 h2 v1 h-2Z M4 11 h2 v1 h-2Z M12 11 h1 v1 h-1Z M15 11 h3 v1 h-3Z M19 11 h1 v1 h-1Z M21 11 h1 v1 h-1Z M23 11 h1 v1 h-1Z M28 11 h4 v1 h-4Z M33 11 h1 v1 h-1Z M37 11 h2 v1 h-2Z M40 11 h2 v1 h-2Z M43 11 h2 v1 h-2Z M0 12 h1 v1 h-1Z M3 12 h2 v1 h-2Z M17 12 h1 v1 h-1Z M19 12 h2 v1 h-2Z M23 12 h2 v1 h-2Z M26 12 h6 v1 h-6Z M33 12 h1 v1 h-1Z M35 12 h1 v1 h-1Z M38 12 h1 v1 h-1Z M40 12 h2 v1 h-2Z M43 12 h3 v1 h-3Z M48 12 h1 v1 h-1Z M0 13 h1 v1 h-1Z M2 13 h1 v1 h-1Z M5 13 h1 v1 h-1Z M9 13 h1 v1 h-1Z M11 13 h1 v1 h-1Z M13 13 h1 v1 h-1Z M18 13 h1 v1 h-1Z M21 13 h2 v1 h-2Z M24 13 h2 v1 h-2Z M27 13 h4 v1 h-4Z M35 13 h1 v1 h-1Z M41 13 h4 v1 h-4Z M48 13 h1 v1 h-1Z M0 14 h2 v1 h-2Z M3 14 h1 v1 h-1Z M5 14 h1 v1 h-1Z M7 14 h1 v1 h-1Z M10 14 h1 v1 h-1Z M17 14 h2 v1 h-2Z M20 14 h2 v1 h-2Z M23 14 h3 v1 h-3Z M28 14 h1 v1 h-1Z M33 14 h4 v1 h-4Z M38 14 h1 v1 h-1Z M40 14 h2 v1 h-2Z M44 14 h5 v1 h-5Z M0 15 h3 v1 h-3Z M5 15 h1 v1 h-1Z M8 15 h1 v1 h-1Z M10 15 h2 v1 h-2Z M13 15 h4 v1 h-4Z M19 15 h2 v1 h-2Z M23 15 h3 v1 h-3Z M27 15 h2 v1 h-2Z M30 15 h1 v1 h-1Z M37 15 h1 v1 h-1Z M39 15 h1 v1 h-1Z M43 15 h1 v1 h-1Z M45 15 h3 v1 h-3Z M1 16 h1 v1 h-1Z M3 16 h3 v1 h-3Z M7 16 h2 v1 h-2Z M11 16 h1 v1 h-1Z M13 16 h3 v1 h-3Z M18 16 h1 v1 h-1Z M20 16 h1 v1 h-1Z M26 16 h3 v1 h-3Z M34 16 h3 v1 h-3Z M38 16 h2 v1 h-2Z M41 16 h4 v1 h-4Z M48 16 h1 v1 h-1Z M0 17 h4 v1 h-4Z M7 17 h1 v1 h-1Z M10 17 h1 v1 h-1Z M13 17 h1 v1 h-1Z M15 17 h2 v1 h-2Z M20 17 h3 v1 h-3Z M28 17 h2 v1 h-2Z M31 17 h1 v1 h-1Z M33 17 h2 v1 h-2Z M36 17 h6 v1 h-6Z M43 17 h1 v1 h-1Z M47 17 h2 v1 h-2Z M0 18 h3 v1 h-3Z M8 18 h5 v1 h-5Z M15 18 h2 v1 h-2Z M18 18 h1 v1 h-1Z M20 18 h1 v1 h-1Z M22 18 h2 v1 h-2Z M26 18 h1 v1 h-1Z M29 18 h1 v1 h-1Z M31 18 h4 v1 h-4Z M36 18 h1 v1 h-1Z M40 18 h2 v1 h-2Z M44 18 h1 v1 h-1Z M3 19 h1 v1 h-1Z M5 19 h1 v1 h-1Z M9 19 h3 v1 h-3Z M13 19 h4 v1 h-4Z M18 19 h1 v1 h-1Z M20 19 h2 v1 h-2Z M24 19 h4 v1 h-4Z M29 19 h1 v1 h-1Z M31 19 h2 v1 h-2Z M34 19 h1 v1 h-1Z M37 19 h1 v1 h-1Z M39 19 h1 v1 h-1Z M41 19 h2 v1 h-2Z M44 19 h1 v1 h-1Z M47 19 h1 v1 h-1Z M0 20 h1 v1 h-1Z M10 20 h1 v1 h-1Z M12 20 h1 v1 h-1Z M14 20 h2 v1 h-2Z M18 20 h2 v1 h-2Z M21 20 h1 v1 h-1Z M25 20 h1 v1 h-1Z M29 20 h1 v1 h-1Z M32 20 h2 v1 h-2Z M35 20 h3 v1 h-3Z M40 20 h2 v1 h-2Z M44 20 h1 v1 h-1Z M47 20 h1 v1 h-1Z M2 21 h2 v1 h-2Z M7 21 h3 v1 h-3Z M17 21 h2 v1 h-2Z M21 21 h1 v1 h-1Z M23 21 h1 v1 h-1Z M27 21 h1 v1 h-1Z M31 21 h1 v1 h-1Z M34 21 h3 v1 h-3Z M41 21 h5 v1 h-5Z M48 21 h1 v1 h-1Z M0 22 h4 v1 h-4Z M9 22 h2 v1 h-2Z M13 22 h1 v1 h-1Z M16 22 h2 v1 h-2Z M19 22 h3 v1 h-3Z M28 22 h1 v1 h-1Z M30 22 h1 v1 h-1Z M34 22 h1 v1 h-1Z M36 22 h1 v1 h-1Z M38 22 h2 v1 h-2Z M45 22 h1 v1 h-1Z M47 22 h2 v1 h-2Z M1 23 h2 v1 h-2Z M9 23 h1 v1 h-1Z M11 23 h1 v1 h-1Z M13 23 h1 v1 h-1Z M21 23 h1 v1 h-1Z M28 23 h1 v1 h-1Z M30 23 h1 v1 h-1Z M34 23 h1 v1 h-1Z M39 23 h1 v1 h-1Z M46 23 h2 v1 h-2Z M11 24 h1 v1 h-1Z M13 24 h1 v1 h-1Z M27 24 h2 v1 h-2Z M30 24 h1 v1 h-1Z M32 24 h1 v1 h-1Z M39 24 h1 v1 h-1Z M46 24 h1 v1 h-1Z M48 24 h1 v1 h-1Z M0 25 h4 v1 h-4Z M9 25 h1 v1 h-1Z M11 25 h2 v1 h-2Z M16 25 h2 v1 h-2Z M19 25 h1 v1 h-1Z M27 25 h3 v1 h-3Z M32 25 h2 v1 h-2Z M36 25 h2 v1 h-2Z M47 25 h1 v1 h-1Z M0 26 h1 v1 h-1Z M3 26 h1 v1 h-1Z M11 26 h2 v1 h-2Z M14 26 h1 v1 h-1Z M19 26 h1 v1 h-1Z M28 26 h4 v1 h-4Z M35 26 h5 v1 h-5Z M45 26 h2 v1 h-2Z M0 27 h5 v1 h-5Z M7 27 h2 v1 h-2Z M10 27 h3 v1 h-3Z M14 27 h1 v1 h-1Z M16 27 h1 v1 h-1Z M20 27 h5 v1 h-5Z M27 27 h1 v1 h-1Z M29 27 h3 v1 h-3Z M33 27 h1 v1 h-1Z M35 27 h3 v1 h-3Z M40 27 h5 v1 h-5Z M1 28 h3 v1 h-3Z M5 28 h1 v1 h-1Z M7 28 h1 v1 h-1Z M12 28 h3 v1 h-3Z M16 28 h1 v1 h-1Z M20 28 h1 v1 h-1Z M24 28 h2 v1 h-2Z M27 28 h1 v1 h-1Z M29 28 h2 v1 h-2Z M32 28 h1 v1 h-1Z M36 28 h3 v1 h-3Z M42 28 h1 v1 h-1Z M44 28 h1 v1 h-1Z M47 28 h1 v1 h-1Z M3 29 h2 v1 h-2Z M7 29 h4 v1 h-4Z M12 29 h1 v1 h-1Z M14 29 h1 v1 h-1Z M16 29 h2 v1 h-2Z M19 29 h5 v1 h-5Z M25 29 h3 v1 h-3Z M36 29 h2 v1 h-2Z M41 29 h2 v1 h-2Z M48 29 h1 v1 h-1Z M2 30 h3 v1 h-3Z M9 30 h1 v1 h-1Z M11 30 h1 v1 h-1Z M14 30 h1 v1 h-1Z M16 30 h1 v1 h-1Z M19 30 h1 v1 h-1Z M21 30 h4 v1 h-4Z M26 30 h1 v1 h-1Z M28 30 h1 v1 h-1Z M32 30 h2 v1 h-2Z M35 30 h3 v1 h-3Z M44 30 h1 v1 h-1Z M47 30 h2 v1 h-2Z M0 31 h1 v1 h-1Z M4 31 h1 v1 h-1Z M8 31 h4 v1 h-4Z M13 31 h2 v1 h-2Z M18 31 h1 v1 h-1Z M21 31 h2 v1 h-2Z M24 31 h3 v1 h-3Z M28 31 h2 v1 h-2Z M31 31 h1 v1 h-1Z M33 31 h5 v1 h-5Z M39 31 h1 v1 h-1Z M43 31 h1 v1 h-1Z M45 31 h2 v1 h-2Z M0 32 h2 v1 h-2Z M3 32 h2 v1 h-2Z M8 32 h3 v1 h-3Z M12 32 h3 v1 h-3Z M18 32 h3 v1 h-3Z M29 32 h5 v1 h-5Z M35 32 h4 v1 h-4Z M41 32 h2 v1 h-2Z M44 32 h1 v1 h-1Z M46 32 h2 v1 h-2Z M0 33 h2 v1 h-2Z M3 33 h2 v1 h-2Z M7 33 h2 v1 h-2Z M16 33 h1 v1 h-1Z M20 33 h1 v1 h-1Z M22 33 h1 v1 h-1Z M25 33 h3 v1 h-3Z M30 33 h1 v1 h-1Z M32 33 h1 v1 h-1Z M36 33 h3 v1 h-3Z M40 33 h1 v1 h-1Z M42 33 h5 v1 h-5Z M48 33 h1 v1 h-1Z M2 34 h1 v1 h-1Z M4 34 h2 v1 h-2Z M9 34 h2 v1 h-2Z M14 34 h1 v1 h-1Z M21 34 h3 v1 h-3Z M27 34 h2 v1 h-2Z M34 34 h2 v1 h-2Z M37 34 h2 v1 h-2Z M40 34 h1 v1 h-1Z M43 34 h1 v1 h-1Z M0 35 h1 v1 h-1Z M3 35 h1 v1 h-1Z M7 35 h3 v1 h-3Z M12 35 h2 v1 h-2Z M15 35 h1 v1 h-1Z M17 35 h1 v1 h-1Z M19 35 h1 v1 h-1Z M25 35 h1 v1 h-1Z M29 35 h2 v1 h-2Z M32 35 h2 v1 h-2Z M35 35 h1 v1 h-1Z M38 35 h1 v1 h-1Z M40 35 h1 v1 h-1Z M42 35 h1 v1 h-1Z M47 35 h1 v1 h-1Z M3 36 h2 v1 h-2Z M9 36 h5 v1 h-5Z M16 36 h3 v1 h-3Z M20 36 h3 v1 h-3Z M25 36 h4 v1 h-4Z M30 36 h2 v1 h-2Z M34 36 h2 v1 h-2Z M38 36 h1 v1 h-1Z M44 36 h2 v1 h-2Z M48 36 h1 v1 h-1Z M2 37 h4 v1 h-4Z M8 37 h3 v1 h-3Z M13 37 h1 v1 h-1Z M16 37 h1 v1 h-1Z M18 37 h3 v1 h-3Z M22 37 h3 v1 h-3Z M27 37 h4 v1 h-4Z M34 37 h3 v1 h-3Z M38 37 h2 v1 h-2Z M41 37 h1 v1 h-1Z M43 37 h1 v1 h-1Z M48 37 h1 v1 h-1Z M7 38 h1 v1 h-1Z M13 38 h5 v1 h-5Z M19 38 h2 v1 h-2Z M22 38 h1 v1 h-1Z M25 38 h3 v1 h-3Z M29 38 h1 v1 h-1Z M31 38 h1 v1 h-1Z M34 38 h2 v1 h-2Z M38 38 h1 v1 h-1Z M40 38 h3 v1 h-3Z M44 38 h4 v1 h-4Z M10 39 h1 v1 h-1Z M14 39 h1 v1 h-1Z M16 39 h5 v1 h-5Z M25 39 h2 v1 h-2Z M29 39 h6 v1 h-6Z M37 39 h1 v1 h-1Z M39 39 h1 v1 h-1Z M41 39 h1 v1 h-1Z M43 39 h2 v1 h-2Z M46 39 h3 v1 h-3Z M8 40 h3 v1 h-3Z M13 40 h2 v1 h-2Z M16 40 h2 v1 h-2Z M19 40 h1 v1 h-1Z M27 40 h1 v1 h-1Z M30 40 h1 v1 h-1Z M33 40 h5 v1 h-5Z M39 40 h1 v1 h-1Z M45 40 h1 v1 h-1Z M47 40 h1 v1 h-1Z M11 41 h1 v1 h-1Z M17 41 h3 v1 h-3Z M31 41 h2 v1 h-2Z M35 41 h1 v1 h-1Z M38 41 h1 v1 h-1Z M45 41 h1 v1 h-1Z M9 42 h1 v1 h-1Z M11 42 h1 v1 h-1Z M16 42 h2 v1 h-2Z M19 42 h3 v1 h-3Z M28 42 h3 v1 h-3Z M32 42 h1 v1 h-1Z M36 42 h1 v1 h-1Z M46 42 h2 v1 h-2Z M10 43 h1 v1 h-1Z M15 43 h1 v1 h-1Z M18 43 h2 v1 h-2Z M27 43 h3 v1 h-3Z M31 43 h1 v1 h-1Z M33 43 h1 v1 h-1Z M35 43 h2 v1 h-2Z M38 43 h2 v1 h-2Z M45 43 h4 v1 h-4Z M10 44 h2 v1 h-2Z M13 44 h2 v1 h-2Z M19 44 h2 v1 h-2Z M29 44 h6 v1 h-6Z M38 44 h1 v1 h-1Z M46 44 h1 v1 h-1Z M48 44 h1 v1 h-1Z M9 45 h1 v1 h-1Z M11 45 h1 v1 h-1Z M13 45 h2 v1 h-2Z M16 45 h3 v1 h-3Z M22 45 h6 v1 h-6Z M29 45 h1 v1 h-1Z M31 45 h1 v1 h-1Z M34 45 h2 v1 h-2Z M39 45 h2 v1 h-2Z M42 45 h1 v1 h-1Z M44 45 h3 v1 h-3Z M48 45 h1 v1 h-1Z M10 46 h2 v1 h-2Z M13 46 h1 v1 h-1Z M15 46 h4 v1 h-4Z M20 46 h2 v1 h-2Z M23 46 h1 v1 h-1Z M25 46 h1 v1 h-1Z M28 46 h3 v1 h-3Z M32 46 h2 v1 h-2Z M36 46 h3 v1 h-3Z M40 46 h1 v1 h-1Z M43 46 h2 v1 h-2Z M46 46 h1 v1 h-1Z M10 47 h2 v1 h-2Z M13 47 h1 v1 h-1Z M16 47 h1 v1 h-1Z M18 47 h4 v1 h-4Z M24 47 h1 v1 h-1Z M27 47 h2 v1 h-2Z M30 47 h1 v1 h-1Z M36 47 h2 v1 h-2Z M39 47 h2 v1 h-2Z M42 47 h1 v1 h-1Z M44 47 h1 v1 h-1Z M10 48 h4 v1 h-4Z M15 48 h4 v1 h-4Z M21 48 h3 v1 h-3Z M26 48 h3 v1 h-3Z M34 48 h1 v1 h-1Z M36 48 h1 v1 h-1Z M38 48 h1 v1 h-1Z M41 48 h1 v1 h-1Z M44 48 h1 v1 h-1Z M48 48 h1 v1 h-1Z "></path>
                                                                        <path class="qr-1536 " stroke="transparent" fill="#000" fill-opacity="1" d="M0 0 h7 v1 h-7Z M42 0 h7 v1 h-7Z M0 1 h1 v1 h-1Z M6 1 h1 v1 h-1Z M42 1 h1 v1 h-1Z M48 1 h1 v1 h-1Z M0 2 h1 v1 h-1Z M2 2 h3 v1 h-3Z M6 2 h1 v1 h-1Z M42 2 h1 v1 h-1Z M44 2 h3 v1 h-3Z M48 2 h1 v1 h-1Z M0 3 h1 v1 h-1Z M2 3 h3 v1 h-3Z M6 3 h1 v1 h-1Z M42 3 h1 v1 h-1Z M44 3 h3 v1 h-3Z M48 3 h1 v1 h-1Z M0 4 h1 v1 h-1Z M2 4 h3 v1 h-3Z M6 4 h1 v1 h-1Z M42 4 h1 v1 h-1Z M44 4 h3 v1 h-3Z M48 4 h1 v1 h-1Z M0 5 h1 v1 h-1Z M6 5 h1 v1 h-1Z M42 5 h1 v1 h-1Z M48 5 h1 v1 h-1Z M0 6 h7 v1 h-7Z M42 6 h7 v1 h-7Z M0 42 h7 v1 h-7Z M0 43 h1 v1 h-1Z M6 43 h1 v1 h-1Z M0 44 h1 v1 h-1Z M2 44 h3 v1 h-3Z M6 44 h1 v1 h-1Z M0 45 h1 v1 h-1Z M2 45 h3 v1 h-3Z M6 45 h1 v1 h-1Z M0 46 h1 v1 h-1Z M2 46 h3 v1 h-3Z M6 46 h1 v1 h-1Z M0 47 h1 v1 h-1Z M6 47 h1 v1 h-1Z M0 48 h7 v1 h-7Z "></path>
                                                                        <path class="qr-2560 " stroke="transparent" fill="#000" fill-opacity="1" d="M22 4 h5 v1 h-5Z M22 5 h1 v1 h-1Z M26 5 h1 v1 h-1Z M22 6 h1 v1 h-1Z M24 6 h1 v1 h-1Z M26 6 h1 v1 h-1Z M22 7 h1 v1 h-1Z M26 7 h1 v1 h-1Z M22 8 h5 v1 h-5Z M4 22 h5 v1 h-5Z M22 22 h5 v1 h-5Z M40 22 h5 v1 h-5Z M4 23 h1 v1 h-1Z M8 23 h1 v1 h-1Z M22 23 h1 v1 h-1Z M26 23 h1 v1 h-1Z M40 23 h1 v1 h-1Z M44 23 h1 v1 h-1Z M4 24 h1 v1 h-1Z M6 24 h1 v1 h-1Z M8 24 h1 v1 h-1Z M22 24 h1 v1 h-1Z M24 24 h1 v1 h-1Z M26 24 h1 v1 h-1Z M40 24 h1 v1 h-1Z M42 24 h1 v1 h-1Z M44 24 h1 v1 h-1Z M4 25 h1 v1 h-1Z M8 25 h1 v1 h-1Z M22 25 h1 v1 h-1Z M26 25 h1 v1 h-1Z M40 25 h1 v1 h-1Z M44 25 h1 v1 h-1Z M4 26 h5 v1 h-5Z M22 26 h5 v1 h-5Z M40 26 h5 v1 h-5Z M22 40 h5 v1 h-5Z M40 40 h5 v1 h-5Z M22 41 h1 v1 h-1Z M26 41 h1 v1 h-1Z M40 41 h1 v1 h-1Z M44 41 h1 v1 h-1Z M22 42 h1 v1 h-1Z M24 42 h1 v1 h-1Z M26 42 h1 v1 h-1Z M40 42 h1 v1 h-1Z M42 42 h1 v1 h-1Z M44 42 h1 v1 h-1Z M22 43 h1 v1 h-1Z M26 43 h1 v1 h-1Z M40 43 h1 v1 h-1Z M44 43 h1 v1 h-1Z M22 44 h5 v1 h-5Z M40 44 h5 v1 h-5Z "></path>
                                                                        <path class="qr-3072 " stroke="transparent" fill="#000" fill-opacity="1" d="M8 6 h1 v1 h-1Z M10 6 h1 v1 h-1Z M12 6 h1 v1 h-1Z M14 6 h1 v1 h-1Z M16 6 h1 v1 h-1Z M18 6 h1 v1 h-1Z M20 6 h1 v1 h-1Z M28 6 h1 v1 h-1Z M30 6 h1 v1 h-1Z M32 6 h1 v1 h-1Z M34 6 h1 v1 h-1Z M36 6 h1 v1 h-1Z M38 6 h1 v1 h-1Z M40 6 h1 v1 h-1Z M6 8 h1 v1 h-1Z M6 10 h1 v1 h-1Z M6 12 h1 v1 h-1Z M6 14 h1 v1 h-1Z M6 16 h1 v1 h-1Z M6 18 h1 v1 h-1Z M6 20 h1 v1 h-1Z M6 28 h1 v1 h-1Z M6 30 h1 v1 h-1Z M6 32 h1 v1 h-1Z M6 34 h1 v1 h-1Z M6 36 h1 v1 h-1Z M6 38 h1 v1 h-1Z M6 40 h1 v1 h-1Z "></path>
                                                                        <path class="qr-3584 " stroke="transparent" fill="#000" fill-opacity="1" d="M8 0 h1 v1 h-1Z M8 3 h1 v1 h-1Z M8 4 h1 v1 h-1Z M8 5 h1 v1 h-1Z M8 7 h1 v1 h-1Z M0 8 h1 v1 h-1Z M4 8 h1 v1 h-1Z M7 8 h2 v1 h-2Z M41 8 h5 v1 h-5Z M48 8 h1 v1 h-1Z M8 42 h1 v1 h-1Z M8 44 h1 v1 h-1Z M8 48 h1 v1 h-1Z "></path>
                                                                        <path class="qr-4096 " stroke="transparent" fill="#000" fill-opacity="1" d="M40 0 h1 v1 h-1Z M38 1 h3 v1 h-3Z M39 2 h2 v1 h-2Z M39 3 h1 v1 h-1Z M38 5 h1 v1 h-1Z M1 38 h1 v1 h-1Z M5 38 h1 v1 h-1Z M1 39 h3 v1 h-3Z M0 40 h3 v1 h-3Z "></path>
                                                                    </svg> </span> </div>
                                                        </div>
                                                        <h3></h3>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    <script>
                                        var printButton = document.getElementById('print-button');
                                        printButton.addEventListener('click', function() {
                                            window.print();
                                        })
                                        window.onload = function() {
                                            try {
                                                if (screen.width >= 300 && screen.width < 500) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.35,width=device-width');
                                                } else if (screen.width > 500 && screen.width < 600) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.6,width=device-width');
                                                } else if (screen.width > 600 && screen.width < 700) {
                                                    var mvp = document.getElementById('vp');
                                                    mvp.setAttribute('content', 'initial-scale=0.7,width=device-width');
                                                }

                                            } catch (e) {

                                            }
                                        }
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="w-100 bg-000 z-3 fixed left-0 bottom-0 d-flex ai-center jc-center" width="1358" height="0">
                <div class="shadow-1-top m-auto radius container-xl-w" id="base_layout_desktop_fixed_footer"></div>
            </div>
        </div>
    </div>
</body>
</html>