<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Geo Tagging Of Educational Intitution</title>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
   </head>
   <style>
      /* Set the size of the div element that contains the map */
      #map {
      height: 700px;  /* The height is 400 pixels */
      width: 100%;  /* The width is the width of the web page */
      }
      .selectwidth{
      width: 66%;
      height: 30px;
      font-size: 15px;
      }
      label{font-size:13px;}
      table, th, td {
      border: 1px solid;
      }
      #college_data{
      overflow:scroll;
      margin: -33px 15px 10px 15px;
      padding: 5px 5px 5px 5px;
      height:430px;
      }
      .set-background-color{
      background-color:aliceblue;
      }
      .set-color{
      color:#53ff00;
      }
      .details:hover,.sethand {
      cursor: pointer;
      }
   </style>
   <body>
       
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                           <div class="col-md-3 campus_map" id="campus_map"></div>
                           <div class="col-md-3 website" id="website"></div>
                           <div class="col-md-3 virtual_tour" id="virtual_tour"></div>
                           <div class="col-md-3 vr_pics" id="vr_pics"></div>
                        </div>
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
      <div class="custom-container set-background-color" >
         <div class="row">
            <!--<div class="col-md-12">
               <img src="https://sirtbhopal.ac.in/hackathon/assets/MHRD_LOGO.png" />
               </div> -->
            <div class="col-md-4">
               <div class="section" style="border-style: solid;margin-top:20px;height:700px;">
                  <div class="heading" style="margin-left:30px;">
                     <h3>Search College List</h3>
                     <br>
                     <form action="<?php base_url('index.php/map/index'); ?>" enctype="multipart/form-data" method="post">
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                              <label>State</label>
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
                           <div class="form-group">
                              <label>City</label>
                              <br />
                              <select class="custom-select selectwidth" name="city" id="city-name" onchange="getcitydata(this.value)">
                                 <option value="">Select</option>
                                 <option value=""></option>
                              </select>
                           </div>
                        </div>
                        <div class="col-lg-12 col-md-12">
                           <div class="form-group">
                              <label>College Type</label>
                              <br />
                              <select class="custom-select selectwidth" name="college_type" id="college_type" onchange="changecollegetype(this.value)" >
                                 <option selected>Select College Type</option>
                                 <?php foreach ($college_type as $key => $element) { ?>
                                 <option value="<?php echo $element->id; ?>"><?php echo $element->category_name; ?>
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
                  <div id="college_data" >
                  </div>
               </div>
            </div>
            <div class="col-md-8">
               <div class="section" style="border-style: solid;margin-top:20px;height:700px;">
                  <div class="row">
                     <div class="col-md-6">
                        <img src="https://sirtbhopal.ac.in/hackathon/assets/logo.jpeg" /> 
                     </div>
                     <div class="col-md-6">
                        <h2 class="set-color">College Geo Portal</h2>
                     </div>
                  </div>
                  <div id="mapa">
                     <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d27752246.564574692!2d64.43134076828147!3d20.010503330780313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30635ff06b92b791%3A0xd78c4fa1854213a6!2sIndia!5e1!3m2!1sen!2sin!4v1659671634868!5m2!1sen!2sin"    style="border:0;width:100%;height:700px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <script>
         function collegedetails(college_id){
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
                     $("#campus_map").html("<div id='campus_map'>"+'<a href="' + data.campus_map + '"target="_blank">'+'<img src="https://sirtbhopal.ac.in/hackathon/assets/icon/campus-map.png" width="100%"/>'+'</a>'+"</div>");
                     $("#website").html("<div id='website'>"+'<a href="' + data.website + '"target="_blank">'+'<img src="https://sirtbhopal.ac.in/hackathon/assets/icon/website.png" width="100%"/>'+'</a>'+"</div>");
                     $("#virtual_tour").html("<div id='virtual_tour'>"+'<a href="' + data.virtual_tour + '"target="_blank">'+'<img src="https://sirtbhopal.ac.in/hackathon/assets/icon/virtual-tour.png" width="100%"/>'+'</a>'+"</div>");
                     $("#vr_pics").html("<div id='vr_pics'>"+'<a href="' + data.vr_pics + '"target="_blank">'+'<img src="https://sirtbhopal.ac.in/hackathon/assets/icon/pics.png" width="100%"/>'+'</a>'+"</div>");                                 
                         },
                   
                       });
         }
         
           function changecollegetype(collegetypeid){
               var url = '<?php echo base_url("index.php/map/collegelist"); ?>';
               var state_id = $('#state-name').val();
               var city_id = $('#city-name').val();
                 $.ajax({
                         url: url,
                         type: 'POST',
                         data: {
                                'collegetypeid': collegetypeid,
                                'state_id':state_id,
                                'city_id':city_id
                         },
                         cache: false,
                         dataType: 'html',
                         success: function(data) {
                             
                         //console.log(data);
              //if(!empty(data)){
              $("#college_data").html(data);
             // }else{
             //   $("#college_data").html('<h2 style="color:red;">No Data Found</h2>');  
              //}
           
                   
                         },
                   
                       });
           }
         
         
         
             function getcitydata(city_id){
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
                           if(data.status == true){
              
               $("#mapa").html("<div id='map'>"+ data.iframe +"</div>");
               
           }
                   
                         },
                   
                       });
             }
             
             function get_col_iframe(college_id){
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
              
               $("#mapa").html("<div id='map'>"+ data.iframe +"</div>");
               
           
                   
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
               if(data.status == true){
                  
                   $("#mapa").html("<div id='map'>"+ data.iframe +"</div>");
                   
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
                 complete: function() {
                 },
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
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
   </body>
</html>