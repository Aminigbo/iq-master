<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>MediaCapture and Streams API</title>
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <header>
        <h1>MediaCapture, MediaRecorder and Streams API</h1>
    </header>
    <main>
        
        <p><button id="btnStart">START RECORDING</button><br/>
        <button id="btnStop">STOP RECORDING</button></p>

        <div id="timer"></div>
        
        <video controls id="vid1" style="display: ;"></video>
        
        <video id="vid2" controls style="display: none"></video>
        
        <!-- could save to canvas and do image manipulation and saving too -->
    </main> 

<script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script> 

    <script>
        
        let constraintObj = { 
            audio: false, 
            video: { 

                facingMode: "user", 
                width: { min: 120, ideal: 120, max: 120 },
                height: { min: 90, ideal: 90, max: 90 } 
            } 
        }; 
        // width: 1280, height: 720  -- preference only
        // facingMode: {exact: "user"}
        // facingMode: "environment"
        
        //handle older browsers that might implement getUserMedia in some way
        if (navigator.mediaDevices === undefined) {
            navigator.mediaDevices = {};
            navigator.mediaDevices.getUserMedia = function(constraintObj) {
                let getUserMedia = navigator.webkitGetUserMedia || navigator.mozGetUserMedia;
                if (!getUserMedia) {
                    return Promise.reject(new Error('getUserMedia is not implemented in this browser'));
                }
                return new Promise(function(resolve, reject) {
                    getUserMedia.call(navigator, constraintObj, resolve, reject);
                });
            }
        }else{
            navigator.mediaDevices.enumerateDevices()
            .then(devices => {
                devices.forEach(device=>{
                    console.log(device.kind.toUpperCase(), device.label);
                    //, device.deviceId
                })
            })
            .catch(err=>{
                console.log(err.name, err.message);
            })
        }

        navigator.mediaDevices.getUserMedia(constraintObj)
        .then(function(mediaStreamObj) {
            //connect the media stream to the first video element
            let video = document.querySelector('video');
            if ("srcObject" in video) {
                video.srcObject = mediaStreamObj;
            } else {
                //old version
                video.src = window.URL.createObjectURL(mediaStreamObj);
            }
            
            video.onloadedmetadata = function(ev) {
                //show in the video element what is being captured by the webcam
                video.play();
            };
            
            //add listeners for saving video/audio
            let start = document.getElementById('btnStart');
            let stop = document.getElementById('btnStop');
            let vidSave = document.getElementById('vid2');
            let mediaRecorder = new MediaRecorder(mediaStreamObj);
            let chunks = [];

            $(document).ready(function() {
                mediaRecorder.start();
                console.log(mediaRecorder.state);
                $('#vid2').hide();
            })


            
            // start.addEventListener('click', (ev)=>{
            //     mediaRecorder.start();
            //     console.log(mediaRecorder.state);
            // })

            stop.addEventListener('click', (ev)=>{
                mediaRecorder.stop();
                console.log(mediaRecorder.state);
                $('#vid1').hide();
                $('#vid2').show();
            });




        document.getElementById('timer').innerHTML = 00+":"+15;
 startTimer();
 
 function startTimer() {
 var presentTime = document.getElementById('timer').innerHTML;
 var timeArray = presentTime.split(/[:]+/);
 var m = timeArray[0];
 var s = checkSecond((timeArray[1] - 1));
 //if(s==59){m=m-1}
 //if(m<0){alert('timer completed')}
 
 document.getElementById('timer').innerHTML =
 00 + ":" + s;
 //console.log(m)
 setTimeout(startTimer, 1000);
 }
 
 function checkSecond(sec) {
 if (sec < 10 && sec >= 0) {sec = "" + sec}; // add zero in front of numbers < 10
 if (sec < 0) {

mediaRecorder.stop();
                console.log(mediaRecorder.state);
                $('#vid1').hide();
                $('#vid2').show();
    exit();




};
 return sec;
 }







            mediaRecorder.ondataavailable = function(ev) {
                chunks.push(ev.data);
            }
            mediaRecorder.onstop = (ev)=>{
                let blob = new Blob(chunks, { 'type' : 'video/mp4;' });
                chunks = [];
                console.log(blob);
                let videoURL = window.URL.createObjectURL(blob);
                vidSave.src = videoURL;
                console.log(vidSave);
            }
        })
        .catch(function(err) { 
            console.log(err.name, err.message); 
        });



        
        /*********************************
        getUserMedia returns a Promise
        resolve - returns a MediaStream Object
        reject returns one of the following errors
        AbortError - generic unknown cause
        NotAllowedError (SecurityError) - user rejected permissions
        NotFoundError - missing media track
        NotReadableError - user permissions given but hardware/OS error
        OverconstrainedError - constraint video settings preventing
        TypeError - audio: false, video: false
        *********************************/
    </script>
</body>
</html>