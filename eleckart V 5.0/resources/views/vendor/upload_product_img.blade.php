<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Image upload </title>

    <link rel="stylesheet" href="/custom_css/style.css">

	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="/js/spartan-multi-image-picker.js"></script>

</head>
<body>


    	{{-- <div class="container">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">Select File to Upload</div>
                            <div class="panel-body">
                                <form method="post" enctype="multipart/form-data" action="">
                                    {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="file">Filename</label>
                                        <input type="file" name="myfile" class="form-control" multiple>
                                    </div>
                                    <button type="btn btn-primary">Upload</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div> --}}
             
                <br>
                <br>
                <br>
                <div class="container">
                <form  method="post" enctype="multipart/form-data" action="{{route('vendor.product.image.upload')}}">
                        {{csrf_field()}}
    
                        <div class="cotnainer">
                            <div class="form-horizontal">
                                    <div class="form-group">
                                    <label class="control-label col-md-3">Upload Product Image</label>
                                    <div class="col-md-8">
                                        <div class="row">
                                        <div id="demo"></div>
                                        <p style="color:red">
                                            @if($errors->any())
                                                {{$errors->first('imageUpload')}}
                                            @endif
                            
                                        </p>
                                        <input type="text" name="pro_id" value={{$id}} hidden>
                                        <input type="text" name="v_id" value={{$v_id}} hidden>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                    <label class="control-label col-md-3"></label>
                                    <div class="col-md-8">

                                        <input type="submit" id="publish_pro_button" class="btn btn-primary hvr-wobble-top" data-toggle="modal" data-target="#myModal" value="Publish Product" >
                     
                        </div>
                        </div>
                        </div>
                    
                    </div>
    
    
                </form>
                </div>

                
       
            
            <script>
          $("#demo").spartanMultiImagePicker({
            fieldName:  'imageUpload[]',
            maxCount : 4,
            allowedExt: 'png|jpg|jpeg',
            onAddRow:       function(index){
               
            // if(index == 0){
            //     //console.log('published');
             
            //        // $('#publish_pro_button').prop('disabled',false);
            //        alert('image required');
            
            // }
            // console.log('add row');
            //     console.log(index);

               
            },
            onRemoveRow : function(index){
               
              //  console.log('remove row');

            //   if(index == 0){
            //     alert('image required');
            //   } 
                
               
                // console.log(index);
                // if(index < 9){
                //     $('#publish_pro_button').prop('disabled',true);
                // }
                // else if(index > 4){
                //     $('#publish_pro_button').prop('disabled',false);

                // }
	        },
            

         });
            </script>


<script>
//  function alertMessage(){
//      //if($('#publish_pro_button').attr('required')){

//          alert('image required');
//      //}
//  }

// function alertMessage(){
//     $('#publish_pro_button').find('input').each(function(){
//     if(!$(this).prop('required')){
//         console.log("NR");
//     } else {
//         console.log("IR");
//     }
// });
// }

</script>
    
</body>
</html>