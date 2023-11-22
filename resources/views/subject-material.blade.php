<x-layout>
    <a href="{{ url()->previous() }}"
        class="inline-block p-2 bg-white shadow-lg rounded-full text-sm font-bold px-4 mb-2">
        <span class="flex items-center">
            <span class="material-symbols-outlined">
                arrow_back
            </span>
            <span class="ml-1">
                BACK
            </span>
        </span>
    </a>
    <div class="block md:flex">
        <div class="w-full md:w-2/3 bg-white h-screen overflow-y">
            @if ($sm->file)
                <h1 class="p-2 font-bold uppercase">Uploaded File</h1>
                <iframe src="/{{ str_replace('public', 'storage', $sm->file) }}" frameborder="0"
                    class="w-full h-full"></iframe>
            @endif
            @if ($sm->video_link)
                <h1 class="p-2 font-bold uppercase">Youtube</h1>
                <div id="player" class="w-full"></div>
                <script src="https://www.youtube.com/iframe_api"></script>
                <script>
                    // This function creates an <iframe> (and YouTube player) after the API code downloads.
                    var player;

                    function onYouTubeIframeAPIReady() {
                        player = new YT.Player('player', {
                            height: '400',
                            videoId: '{{ $sm->video_link }}', // Replace VIDEO_ID with the actual video ID
                            events: {
                                'onReady': onPlayerReady,
                                'onStateChange': onPlayerStateChange
                            }
                        });
                    }

                    // The API will call this function when the video player is ready.
                    function onPlayerReady(event) {
                        // You can do something here when the player is ready, if needed.
                    }

                    // The API calls this function when the player's state changes.
                    function onPlayerStateChange(event) {
                        // You can do something here when the player's state changes, if needed.
                    }
                </script>
            @endif
        </div>
        <div class="md:w-1/3 w-full ">
            <video id="video" width="640" height="480" autoplay></video>
            <h1 class="text-lg p-2 items-center flex font-mono bg-white">
              <span class="material-symbols-outlined">
                subject
              </span>
              <span>Visit Logs</span>
            </h1>
            <div style="height: 350px;" class="overflow-y-auto">
              @forelse ($sm->logs as $item)
                  <div class="my-2 w-full shadow-xl p-2 bg-white m-2 rounded text-sm flex items-center justify-between">
                      <div class="flex items-center">
                          <span class="material-symbols-outlined">
                            face
                          </span>
                        <span class="mx-2 text-xs">
                          {{ $item->user->name }}
                        </span>
                        <div class="text-xs font-mono">
                          {{$item->created_at->diffForHumans()}}
                        </div>
                      </div>
                      <span class="font-bold rounded {{$item->mood != 'NO FACE DETECTED' ?  'bg-green-200': 'bg-red-200'}} lowercase p-1 ">{{$item->mood}}</span>
                  </div>
              @empty
                  <div class="text-center"></div>
              @endforelse
            </div>
        </div>
    </div>
    
    <img id="image" style="visibility: hidden" width="640" height="480" alt="Camera Stream">

    <script src="/dist/face-api.min.js"></script>
    <script>
        (async () => {
            // load models 
            await faceapi.nets.ssdMobilenetv1.loadFromUri('/models');
            await faceapi.nets.faceExpressionNet.loadFromUri('/models');

            const image = document.getElementById('image');
            const img = document.querySelector('#image');
            const video = document.getElementById('video');

            const detectMood = async () => {
                try {
                    const canvas = faceapi.createCanvasFromMedia(img);
                    const detection = await faceapi.detectAllFaces(img).withFaceExpressions();

                    let maxEmotion = null;
                    let maxProbability = -1;

                    let {
                        expressions
                    } = detection[0];

                    // Iterate through expressions
                    for (const emotion in expressions) {
                        if (expressions.hasOwnProperty(emotion)) {
                            const probability = expressions[emotion];

                            // Check if the current emotion has a higher probability
                            if (probability > maxProbability) {
                                maxProbability = probability;
                                maxEmotion = emotion;
                            }
                        }
                    }
                    let payload = {
                        user_id: {{ auth()->id() }},
                        mood: maxEmotion,
                        material_id: {{ $sm->id }},
                        expressions: JSON.stringify(expressions),
                    }

                    let response = await window.axios.post('/api/detect', payload)
                    console.log(response);

                } catch (error) {
                  let payload = {
                        user_id: {{ auth()->id() }},
                        mood: "NO FACE DETECTED",
                        material_id: {{ $sm->id }},
                        expressions: "{}",
                    }

                    let result = await window.axios.post('/api/detect', payload)

                    console.log(result)
                }
            }

            navigator.mediaDevices.getUserMedia({
                    video: true
                })
                .then(function(stream) {
                    // Set the video source to the camera stream
                    // video.srcObject = stream;
                    video.srcObject = stream;
                }).catch(function(error) {
                    console.error('Error accessing the camera:', error);
                });


            image.addEventListener('load', function() {
                console.log('loaded')
                detectMood()
            });

            video.addEventListener('loadedmetadata', () => {
                const canvas = document.createElement('canvas');
                const context = canvas.getContext('2d');

                // Set the canvas dimensions to match the video dimensions
                canvas.width = video.videoWidth;
                canvas.height = video.videoHeight;


                setInterval(function() {
                    // Draw the current video frame onto the canvas
                    context.drawImage(video, 0, 0, canvas.width, canvas.height);

                    // Convert the canvas content to a data URL and set it as the image source
                    image.src = canvas.toDataURL('image/png');
                }, 1000 * 30);
            })
        })();
    </script>
</x-layout>
