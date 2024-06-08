<!doctype html>
<html lang="en">

<head>
    <link rel="icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/icon/favicon.ico" />
    <title>Geo Tagging Of Educational Intitution</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://sirtbhopal.ac.in/hackathon/assets/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script nonce="a1b8efe0-2a00-4d74-9595-6014990af14a">
    (function(w, d) {
        ! function(a, e, t, r) {
            a.zarazData = a.zarazData || {};
            a.zarazData.executed = [];
            a.zaraz = {
                deferred: []
            };
            a.zaraz.q = [];
            a.zaraz._f = function(e) {
                return function() {
                    var t = Array.prototype.slice.call(arguments);
                    a.zaraz.q.push({
                        m: e,
                        a: t
                    })
                }
            };
            for (const e of ["track", "set", "ecommerce", "debug"]) a.zaraz[e] = a.zaraz._f(e);
            a.zaraz.init = () => {
                var t = e.getElementsByTagName(r)[0],
                    z = e.createElement(r),
                    n = e.getElementsByTagName("title")[0];
                n && (a.zarazData.t = e.getElementsByTagName("title")[0].text);
                a.zarazData.x = Math.random();
                a.zarazData.w = a.screen.width;
                a.zarazData.h = a.screen.height;
                a.zarazData.j = a.innerHeight;
                a.zarazData.e = a.innerWidth;
                a.zarazData.l = a.location.href;
                a.zarazData.r = e.referrer;
                a.zarazData.k = a.screen.colorDepth;
                a.zarazData.n = e.characterSet;
                a.zarazData.o = (new Date).getTimezoneOffset();
                a.zarazData.q = [];
                for (; a.zaraz.q.length;) {
                    const e = a.zaraz.q.shift();
                    a.zarazData.q.push(e)
                }
                z.defer = !0;
                for (const e of [localStorage, sessionStorage]) Object.keys(e || {}).filter((a => a.startsWith(
                    "_zaraz_"))).forEach((t => {
                    try {
                        a.zarazData["z_" + t.slice(7)] = JSON.parse(e.getItem(t))
                    } catch {
                        a.zarazData["z_" + t.slice(7)] = e.getItem(t)
                    }
                }));
                z.referrerPolicy = "origin";
                z.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(a.zarazData)));
                t.parentNode.insertBefore(z, t)
            };
            ["complete", "interactive"].includes(e.readyState) ? zaraz.init() : a.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, 0, "script");
    })(window, document);
    </script>
    <style>
    /* Set the size of the div element that contains the map */
    #map {
        height: 700px;
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

    .selectwidth {
        width: 66%;
        /*height: 30px;*/
        font-size: 15px;
    }

    label {
        font-size: 13px;
    }

    table,
    th,
    td {
        border: 1px solid;
    }

    #college_data {
        overflow: scroll;
        margin: -33px 15px 10px 15px;
        padding: 5px 5px 5px 5px;
        height: 350px;
    }

    .set-background-color {
        background-color: white;
    }

    .set-color {
        color: black;
        margin-top: 14px;
    }

    .set-logo {
        margin-left: 25px;
        margin-top: 10px;
    }

    .details:hover,
    .sethand {
        cursor: pointer;
    }

    .copyright {
        padding: 10px 0;
        margin: 17px;
        background-color: #f5f1f1;
        border: 1px solid #e44e4e;
        border-radius: 30px;
    }

    .copyright span,
    .copyright a {
        color: #e44e4e;
        -webkit-transition: all 0.3s linear;
        -o-transition: all 0.3s linear;
        transition: all 0.3s linear;
    }

    .copyright a:hover {
        color: red;


    }

    .copyright-menu ul {
        text-align: right;
        margin: 0;
        font-weight: 600 !important;
    }

    .copyright-menu li {
        display: inline-block;
        padding-left: 20px;
    }

    .set-center {
        text-align: center;
    }

    .set-top-row {
        background-image: linear-gradient(360deg, red, transparent);
        ;
    }

    .bg-white {
        background-color: white;
    }

    .nav-link {
        color: rgb(217 10 10 / 72%) !important;
    }

    .searchform {
        height: 50px !important;
    }

    .ftco-section {
        padding: 0em 0 !important;
    }

    footer,
    .top-sect {
        font-family: -apple-system, -apple-system;
    }

    .set-color-lightred {
        color: #e44e4e;
        padding-right: 15px;
    }

    .fontsize18 {
        font-size: 18px;
        margin-left: -88px;
    }

    .addfam {
        font-family: "Times New Roman", Times, serif;
        font-size: 35px;
    }

    .setborder {
        border: 2px solid #e44e4e;
        border-radius: 30px;
    }

    .sethov:hover {
        border: 2px solid black;
    }
    </style>
</head>

<body>

    <section class="ftco-section top-sect"
        style="box-shadow: 0px 5px 10px 0px rgb(131 119 119 / 69%);margin-bottom:13px;">
        <div>
            <div class="row set-top-row col-md-12">
                <div class="col-md-6 ">
                    <img class="set-logo" src="https://sirtbhopal.ac.in/hackathon/assets/logo.png" />
                </div>
                <div class="col-md-5"></div>
                <div class="col-md-1">
                    <img class="" width="80%" src="<?php echo base_url(); ?>assets/aicte-logo.png" />
                </div>

            </div>
            <!--<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">-->
            <nav class="navbar navbar-expand-lg bg-white" id="ftco-navbar">

                <div class="collapse navbar-collapse fontsize18" id="ftco-nav">
                    <div class="col-md-12 text-center">

                        <h1 class="set-color addfam" style="color:#046d73;"><b> Geo-Tagging Of Educational
                                Institutions</b></h1>
                    </div>
                    <span class="fa fa-list set-color-lightred"></span>
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>
                        <!--<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Page</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04">
                           <a class="dropdown-item" href="#">Page 1</a>
                           <a class="dropdown-item" href="#">Page 2</a>
                           <a class="dropdown-item" href="#">Page 3</a>
                           <a class="dropdown-item" href="#">Page 4</a>
                        </div>
                     </li>-->

                    </ul>
                </div>
        </div>
        </nav>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title college_name" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="col-md-12">
                            <p class="full_address"></p>
                            <div class="row">
                                <!--<div class="col-md-3 campus_map" id="campus_map"></div>-->
                                <div class="col-md-4 website sethov" id="website"></div>
                                <div class="col-md-4 virtual_tour sethov" id="virtual_tour"><input type="hidden"
                                        id="fream" value="" /><img
                                        src="https://sirtbhopal.ac.in/hackathon/assets/icon/virtual-tour.png"
                                        width="100%" onclick="getvt()" data-toggle="modal" data-target="#vModal"
                                        style="cursor: pointer;" /></div>
                                <div class="col-md-4 vr_pics sethov" id="vr_pics"></div>
                            </div><br><br>
                            <p><b>Degree : </b><span id="degree"></span></p>
                            <p></p> <b>Facilities : </b><span id="facilities"></span></p>
                            <p><b>Placement : </b><span id="placement"></span></p>
                            <p><b>Cut-Off : </b><span id="cutoff"></span></p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>

    <!------------------------------------------------>
    <!-- Modal -->
    <div class="modal fade" id="vModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title college_name" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="col-md-12" id="vt">

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
    <!--website Modal -->
    <div class="modal fade" id="webModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title college_name" id="exampleModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="col-md-12" id="web">


                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>-->
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------>

    <div class="custom-container set-background-color">
        <div class="row">
            <!--<div class="col-md-12">
               <img src="https://sirtbhopal.ac.in/hackathon/assets/MHRD_LOGO.png" />
               </div> -->
            <div class="col-md-4">
                <div class="section"
                    style="margin-top:20px;height:700px;background-image: linear-gradient(88deg, #0f7620, transparent);">
                    <div class="heading" style="margin-left:30px;">
                        <h3 class="set-center" style="font-family:georgia"><b>Search College List</b></h3>
                        <hr>
                        <br>
                        <form action="<?php base_url('index.php/map/index'); ?>" enctype="multipart/form-data"
                            method="post">
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group set-center">
                                    <label style="font-size: 25px"> <b>Select State</b></label>
                                    <br />
                                    <select class="custom-select selectwidth" name="state" id="state-name">
                                        <option value="">Select</option>
                                        <?php foreach ($states as $key => $element) { ?>
                                        <option value="<?php echo $element->id; ?>"><?php echo $element->name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group set-center">
                                    <label style="font-size: 25px"><b>Select City </b></label>
                                    <br />
                                    <select class="custom-select selectwidth" name="city" id="city-name"
                                        onchange="getcitydata(this.value)">
                                        <option value="">Select</option>
                                        <option value=""></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group set-center">
                                    <label style="font-size: 25px"><b>Select College Type</b></label>
                                    <br />
                                    <select class="custom-select selectwidth" name="college_type" id="college_type"
                                        onchange="changecollegetype(this.value)">
                                        <option>Select College Type</option>
                                        <?php foreach ($college_type as $key => $element) { ?>
                                        <option value="<?php echo $element->id; ?>">
                                            <?php echo $element->category_name; ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <!--<div class="col-lg-12 col-md-12">
                           <div class="form-group">
                              <label>College List</label>
                              <br />
                              <select class="custom-select selectwidth" name="college_list" id="college_list" >
                                 <option selected>Select College List</option>
                                  
                              </select>
                           </div>
                           </div>-->
                            <!--<br>
                           <button type="submit" class="btn btn-success mb-2 save" name="uploadFile" value="UPLOAD">Save</button>-->
                        </form>
                    </div>
                    <hr>
                    <br>
                    <div id="college_data">
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="section" style="border-style: solid;margin-top:20px;height:700px;">

                    <div id="mapa">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27752246.564574692!2d64.43134076828147!3d20.010503330780313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e1!3m2!1sen!2sin!4v1659671634868!5m2!1sen!2sin"
                            style="border:0;width:100%;height:700px;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
    function getvt(da) {

        var da = $('#fream').val()
        $('#vt').html(da);
    }

    function collegedetails(college_id) {
        var url = '<?php echo base_url("index.php/map/collegedetails"); ?>';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'college_id': college_id

            },
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                // alert(data.clg_name);
                $(".college_name").html(data.clg_name);
                $(".full_address").html(data.full_address);
                /* $("#campus_map").html("<div id='campus_map'>"+'<a href="' + data.campus_map + '"target="_blank">'+'<img src="<?php echo base_url(); ?>assets/icon/campus-map.png" width="100%"/>'+'</a>'+"</div>");*/
                $("#website").html("<div id='website'>" + '<a href="' + data.website + '"target="_blank">' +
                    '<img src="https://sirtbhopal.ac.in/hackathon/assets/icon/website.png" width="100%"/>' +
                    '</a>' + "</div>");
                $('#webs').val(data.website);
                // $("#virtual_tour").html("<div id='virtual_tour'>"+'<img src="<?php echo base_url(); ?>assets/icon/virtual-tour.png" width="100%" onclick="getvt(+ data.virtual_tour +)" data-toggle="modal" data-target="#vModal" />'+"</div>");
                $('#fream').val(data.virtual_tour);
                $("#vr_pics").html("<div id='vr_pics'>" + '<a href="' + data.vr_pics + '"target="_blank">' +
                    '<img src="<?php echo base_url(); ?>assets/icon/pics.png" width="100%"/>' + '</a>' +
                    "</div>");
                $("#degree").html(data.degree);
                $("#facilities").html(data.facilities);
                $("#placement").html(data.placement);
                $("#cutoff").html(data.cutoff);
            },

        });
    }

    function changecollegetype(collegetypeid) {
        var url = '<?php echo base_url("index.php/map/collegelist"); ?>';
        var state_id = $('#state-name').val();
        var city_id = $('#city-name').val();
        //alert(collegetypeid);  
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'collegetypeid': collegetypeid,
                'state_id': state_id,
                'city_id': city_id
            },
            cache: false,
            dataType: 'html',
            success: function(data) {

                //  console.log(data);
                //if(!empty(data)){
                $("#college_data").html(data);
                // }else{
                //   $("#college_data").html('<h2 style="color:red;">No Data Found</h2>');  
                //}


            },

        });
    }



    function getcitydata(city_id) {
        var url = '<?php echo base_url("index.php/map/city_getiframe"); ?>';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'city_id': city_id,
            },
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status == true) {

                    $("#mapa").html("<div id='map'>" + data.iframe + "</div>");

                }

            },

        });
    }

    function get_col_iframe(college_id) {
        var url = '<?php echo base_url("index.php/map/get_col_iframe"); ?>';
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                'id': college_id,
            },
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                console.log(data)

                $("#mapa").html("<div id='map'>" + data.iframe + "</div>");


            },

        });
    }
    </script>
    <script type="text/javascript">
    $('#state-name').on('click', function() {
        var state_id = $('#state-name').val();
        var coupon_url = '<?php echo base_url("index.php/map/getiframe"); ?>';
        $.ajax({
            url: coupon_url,
            type: 'POST',
            data: {
                'state_id': state_id,
            },
            cache: false,
            dataType: 'JSON',
            success: function(data) {
                if (data.status == true) {

                    $("#mapa").html("<div id='map'>" + data.iframe + "</div>");

                }

            },

        });

    });
    </script>
    <script>
    jQuery(document).on('change', 'select#state-name', function(e) {
        e.preventDefault();
        var stateID = jQuery(this).val();
        getCityList(stateID);
    });

    function getCityList(stateID) {
        /* $('#college_type option').attr(selected)*/
        $("#college_type option:first").removeAttr("selected");
        $("#college_type option:first").attr('selected', 'selected');
        $('#college_tab').hide();
        //$("#college_type option:selected").removeAttr("selected");
        $.ajax({
            url: '<?php echo base_url('index.php/map/getcities') ?>',
            type: 'post',
            data: {
                stateID: stateID
            },
            dataType: 'json',
            beforeSend: function() {
                jQuery('select#city-name').find("option:eq(0)").html("Please wait..");
            },
            complete: function() {},
            success: function(json) {
                var options = '';
                options += '<option value="">Select City</option>';
                for (var i = 0; i < json.length; i++) {
                    options += '<option value="' + json[i].city_id + '">' + json[i].city_name + '</option>';
                }
                jQuery("select#city-name").html(options);

            },
            error: function(xhr, ajaxOptions, thrownError) {
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    }
    </script>
    <script src="https://sageuniversity.edu.in/assets/vendor/popper/popper.min.js"></script>
    <script src="https://sageuniversity.edu.in/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
         <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>-->
    <script src="https://sageuniversity.edu.in/assets/vendor/jquery/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js+bootstrap.min.js+main.js.pagespeed.jc.CkBNE38wgd.js"></script>
    <script>
    eval(mod_pagespeed_KCPclvFWlk);
    </script>
    <script>
    eval(mod_pagespeed_ymehVf8unZ);
    </script>
    <script>
    eval(mod_pagespeed_CAIy$zxYJF);
    </script>
    <script defer
        src="https://static.cloudflareinsights.com/beacon.min.js/v652eace1692a40cfa3763df669d7439c1639079717194"
        integrity="sha512-Gi7xpJR8tSkrpF7aordPZQlW2DLtzUlZcumS8dMQjwDHEnw9I7ZLyiOj/6tZStRBGtGgN6ceN6cMH8z7etPGlw=="
        data-cf-beacon='{"rayId":"73b90a4a795c6ee9","token":"cd0b4b3a733644fc843ef0b185f98241","version":"2022.6.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>