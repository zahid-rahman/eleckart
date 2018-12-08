@extends('layouts.default')
@include('layouts.design')

@section('title')
    create product
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
    
@endsection


@section('content-for-other-page')



  <div class="container">
    @if(count($images) == 0 )

    <p style="text-align: center;margin-top:200px;font-size:40px">product image may not uploaded yet</p>

 @else
        <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      {{-- product name    --}}
                        @foreach($images as $name)
                        <h2><b>{{$name->product_name}}</b></h2>
                        @break
                       @endforeach
                       
                  </div>
                  <div class="panel-body">
                         {{-- picture detials --}}
    <table class="table" style="text-align: center">
            <tr>
                <td><b>#</b></td>
                <td style="text-align: center"> <b>Product image</b>    </td>
                <td><b>update</b> </td>
            </tr>
            
            @foreach($images as $product_images)

            <form action="{{route('vendor.product.image.update',['id'=>$product_images->product_id])}}" method="POST" enctype="multipart/form-data">
    
    
            <tr>
                <td>{{$loop->index+1}}</td>
                <td align="center">
                {{-- <a href="{{$product_images->product_image}}" target="_blank"> --}}
                        <label id="custom_update"> 
                                {{-- <span class="glyphicon glyphicon-pencil" style="color:##ffffff;padding:10px 10px 10px 10px" ></span> --}}
                                {{-- <img src="{{$product_images->product_image}}" alt="" height="50%" width="40%" > --}}

                                {{-- <div id="profile-container">
                                        <image id="profileImage" src="{{$product_images->product_image}}" />
                                     </div>
                                <input type="file" name="u_pro_img" id="exampleInputFile"  size="60"  required="" capture> --}}
                                     <div id="profile-container">
                                        <img  role="profileImage" src="{{$product_images->product_image}}" />
                                         
                                     </div>
                                     <input role="imageUpload" type="file" name="u_pro_img"
                                     placeholder="Photo" required="" capture> 
                                          
                            
                            </label>      
    
                  
                {{-- </a> --}}
                </td>
                <td>
                        {{--  --}}
                                <input type="text" name="u_p_id" value="{{$product_images->product_id}}" hidden>
                                <input type="text" name="u_pro_img_id" value="{{$product_images->pro_img_id}}" hidden>
                               <input type="submit" class="btn btn-primary hvr-wobble-top" value="update picture">
                        
                        </form>
                </td>
            </tr>
            @endforeach
            @endif
    </table>



                  </div>
                </div>
        </div>

    
   

 
  </div>

  <script>
    //   $("[role='profileImage']").click(function(e) {

    //     //$this = $(this);
    //     $this.parent().siblings("[role='imageUpload']").trigger('click');
    // });

    function fasterPreview( uploader ) {

    $uploadInputField = $(uploader);
    $previewImageField = $uploadInputField.siblings("#profile-container").find("[role='profileImage']");

    if ( uploader.files || uploader.files[0] ){
        uploadedFileUrl = window.URL.createObjectURL(uploader.files[0]);
        $previewImageField.attr('src', uploadedFileUrl);
    }
    }

    $("[role='imageUpload']").change(function(){
        fasterPreview( this );
    });

</script>

{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> --}}

@endsection