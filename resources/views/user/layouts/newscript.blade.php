 <!-- MUSIC PLAyER SCRIPT  -->

<script type="text/javascript">
  const music = document.querySelector("audio");
    const img = document.querySelector("img");
  const play = document.getElementById('play');
  const title = document.getElementById('title');
 
  const artist = document.getElementById('artist');
  const prev = document.getElementById('prev');
  const next = document.getElementById('next');

  let progress = document.getElementById('progress');
  let total_currentTime = document.getElementById('current_time');
  let total_duration = document.getElementById('duration');
  const progress_div = document.getElementById('progress_div');
  // console.log(music,img,play);

  const songs = [
  {
    name:"song",
    // title:"Pop",
    // artist:"Usman",
    // img: '1'
  },
  {
    name:"1625574804song",
    // title:"Rap",
    // artist:"Hamza",
    // img: '2'
  },
  {
    name:"song",
    // title:"Song",
    // artist:"Bilawa",
    // img: '3'
  },
  ];

  let isPlaying = false;
// for play function
  const playMusic = () => {
    isPlaying = true;
    music.play();

    
    play.classList.replace('fa-play' , 'fa-pause');
    img.classList.add("anime");


  };

 // for pause function

const pauseMusic = () => {
    isPlaying = false;
    music.pause();
    play.classList.replace('fa-pause' , 'fa-play');
    img.classList.remove("anime");


  };

play.addEventListener('click',() =>{
  // if(isPlaying){
  //  pauseMusic();
  // }else{
  //  playMusic();
  // }

  isPlaying ? pauseMusic():playMusic();
});

//changing  music data 

const loadSong = (songs) =>
{
	// console.log(songs.name);
  title.textContent = songs.title;
  // artist.textContent = songs.artist;
  music.src = "music/"+songs.name+".mp3";
  // img.src = "images/"+songs.img+".jpg";

};

 // loadSong(songs[1]); 
 songIndex=0;

// console.log(songIndex);
const nextSong = () =>{

  songIndex = (songIndex+1)%songs.length;
  // console.log(songIndex);
  loadSong(songs[songIndex]);
};

const prevSOng = () => {
         songIndex = (songIndex-1 + songs.length)%songs.length;
         
         loadSong(songs[songIndex]);
};


 // progress js word time line;

 music.addEventListener("timeupdate",(event) =>{
  // console.log(event);
  const {currentTime , duration} = event.srcElement;
  let progress_time = (currentTime/duration)*100;
  progress.style.width = `${progress_time}%`;

  // music duration update 

  // console.log(duration);
   let min_duration = Math.floor(duration/60);
   let sec_duration = Math.floor(duration % 60);
   // console.log(min_duration,sec_duration);

   let tot_duration = `${min_duration}:${sec_duration}`;

   if(duration){
   total_duration.textContent = `${tot_duration}`;
  }

   // current duration update 

   let min_currentTime = Math.floor(currentTime/60);
   let sec_currentTime = Math.floor(currentTime % 60);
   // console.log(min_duration,sec_duration);

   if(sec_currentTime<10){

    sec_currentTime = `0${sec_currentTime}`;
   }

   let tot_currentTime = `${min_currentTime}:${sec_currentTime}`;

   
   total_currentTime.textContent = `${tot_currentTime}`;

   //end

  

 });
// end progress

// progress on click function 
 progress_div.addEventListener('click' , (event)=>{
    const {duration} = music;
    let move_progress = (event.offsetX / event.srcElement.clientWidth)* duration;

    music.currentTime = move_progress;

 });

//end

 // end song then call next

   music.addEventListener('ended', nextSong);
//end


 next.addEventListener("click", nextSong);
 prev.addEventListener("click",prevSOng);

</script>

<script>
function myFunction() {
   let newsong = document.getElementById('playsong').value;
   let title = document.getElementById('title').value;
     // console.log(title);
    const music = document.querySelector("audio");
     music.src = newsong;
     
      isPlaying = true;
    music.play();
    play.classList.replace('fa-play' , 'fa-pause');
    img.classList.add("anime");

}
</script>






   <!--  END SCRIPT MUSIC NEW ADD -->