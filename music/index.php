<html>
  <head>
    <title>Random Song Player</title>
    <style>
      .banner {
        background-color: lightgray;
        padding: 10px;
        text-align: center;
      }
      select {
        margin: 10px;
      }
    </style>
  </head>
  <body onload="loadSongList()">
    <div class="banner" id="banner"></div>
    <select id="songSelect"></select>
    <button id="playButton">Play</button>
    <button id="replayButton">Replay</button>
    <button id="restartButton">Restart</button>
    <button id="stopButton">Stop</button>
    <script>
      const audio = new Audio();
      const playButton = document.getElementById("playButton");
      const replayButton = document.getElementById("replayButton");
      const restartButton = document.getElementById("restartButton");
      const stopButton = document.getElementById("stopButton");
      const banner = document.getElementById("banner");
      const songSelect = document.getElementById("songSelect");

      function loadSongList() {
        const songs = <?php echo json_encode(glob("*.mp3")); ?>;
        songs.forEach(function(song) {
          const option = document.createElement("option");
          option.value = song;
          option.innerText = song;
          songSelect.appendChild(option);
        });
        songSelect.addEventListener("change", function() {
          audio.src = songSelect.value;
          audio.play();
          updateBanner();
          updatePlayButton();
        });
        loadAndPlayRandomSong();
      }

      function loadAndPlayRandomSong() {
        const randomIndex = Math.floor(Math.random() * songSelect.options.length);
        songSelect.selectedIndex = randomIndex;
        audio.src = songSelect.value;
        audio.play();
        updateBanner();
        updatePlayButton();
      }

      function updateBanner() {
        const songName = audio.src;
        banner.innerText = `Now playing: ${songName}`;
      }

      function updatePlayButton() {
        playButton.innerText = audio.paused ? "Resume" : "Pause";
        playButton.addEventListener("click", function() {
          if (audio.paused) {
            audio.play();
            updatePlayButton();
          } else {
            audio.pause();
            updatePlayButton();
          }
        });
      }

      replayButton.addEventListener("click", function() {
        audio.currentTime = 0;
        audio.play();
      });

      restartButton.addEventListener("click", function() {
        loadAndPlayRandomSong();
      });

      stopButton.addEventListener("click", function() {
        audio.pause();
        audio.currentTime = 0;
      });
    </script>
  </body>
</html>

