<!-- 
<div class="app-footer app-player grey bg">
      <div class="playlist" style="width:100%"></div>
    </div>

   
 -->
                           
<div class="app-footer app-player grey bg" >
 <audio id="music" src="" ></audio>

			<!-- progress bar -->
			<div class="progressbar_container" id="progress_container">
				<div class="progress_duration_meter">
					<div class="current_time" id="current_time">
						0:00
					</div>
					<div id="title"></div>
					<div class="duration" id="duration">
						0:00
					</div></div>
					<div class="progress_div" id="progress_div">
						<div class="progress" id="progress"></div>
					</div>
				</div>
				
			
			<!-- controlls -->
			<div class="music_controls">
				<i class="fa fa-backward" style="font-size: 20px;" id="prev" title="Privious" ></i>
				<i class="fa fa-play main_button" id="play" title="Play"></i>
				<i class="fa fa-forward" style="font-size: 20px;" id="next" title="Next"></i>
			</div>
		</div>
<script type="text/javascript">
	function myCartt(element){
      var id = $(element).attr("id");

     
    
       $.ajax({
                method:"POST",
                url: "{{url('/like')}}",
                data: {
                 "id" :id ,
                 
               "_token": "{{ csrf_token() }}",
                  },
                async: false,
                success : function(data) {
                     // console.log(data);
                     if(data == 1){
                     $(".btnn").click(function() {
     
                   $(this).css("color", "red"); 
                      location.reload();
                         });}
                     else{
                         $(".btnn").click(function() {
     
                   $(this).css("color", "black"); 
                    location.reload();

    });}

                     
                   

                },

            });

      
}
</script>


		