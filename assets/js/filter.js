// video image and blog open

document.getElementById("video").addEventListener("click", () => {
    var video = document.querySelector(".videos")
    var image = document.querySelector(".images")
    var blog = document.querySelector(".blogs")
    var selectImage = document.querySelector(".select-image")
    var selectVideo = document.querySelector(".select-video")
    var selectBlog = document.querySelector(".select-blog")
    video.classList.remove("d-none")
    image.classList.add("d-none")
    blog.classList.add("d-none")
    selectImage.classList.remove("active")
    selectVideo.classList.add("active")
    selectBlog.classList.remove("active")
});

document.getElementById("image").addEventListener("click", () => {
    var video = document.querySelector(".videos")
    var image = document.querySelector(".images")
    var blog = document.querySelector(".blogs")
    var selectImage = document.querySelector(".select-image")
    var selectVideo = document.querySelector(".select-video")
    var selectBlog = document.querySelector(".select-blog")
    video.classList.add("d-none")
    image.classList.remove("d-none")
    blog.classList.add("d-none")
    selectImage.classList.add("active")
    selectVideo.classList.remove("active")
    selectBlog.classList.remove("active")
});

document.getElementById("blog").addEventListener("click", () => {
    var video = document.querySelector(".videos")
    var image = document.querySelector(".images")
    var blog = document.querySelector(".blogs")
    var selectImage = document.querySelector(".select-image")
    var selectVideo = document.querySelector(".select-video")
    var selectBlog = document.querySelector(".select-blog")
    video.classList.add("d-none")
    image.classList.add("d-none")
    blog.classList.remove("d-none")
    selectVideo.classList.remove("active")
    selectImage.classList.remove("active")
    selectBlog.classList.add("active")
});

// video or url

document.querySelector(".videos-post").addEventListener("click", () => {
    var selectvideopost = document.querySelector(".select-video-post")
    var selecturlpost = document.querySelector(".select-url-post ")
    var selectvideoactive = document.querySelector(".circle")
    var selecturlactive = document.querySelector(".tick-green")
    var circlevideo = document.querySelector(".circle-video")
    var tickgreenvideo = document.querySelector(".tickgreen-video")
    selectvideopost.classList.remove("d-none")
    selecturlpost.classList.add("d-none")
    selectvideoactive.classList.remove("d-none")
    selecturlactive.classList.add("d-none")
    circlevideo.classList.add("d-none")
    tickgreenvideo.classList.remove("d-none")
});

document.querySelector(".url-post").addEventListener("click", () => {
    var selectvideopost = document.querySelector(".select-video-post")
    var selecturlpost = document.querySelector(".select-url-post ")
    var selectvideoactive = document.querySelector(".circle")
    var selecturlactive = document.querySelector(".tick-green")
    var circlevideo = document.querySelector(".circle-video")
    var tickgreenvideo = document.querySelector(".tickgreen-video")
    selectvideopost.classList.add("d-none")
    selecturlpost.classList.remove("d-none")
    selectvideoactive.classList.add("d-none")
    selecturlactive.classList.remove("d-none")
    circlevideo.classList.remove("d-none")
    tickgreenvideo.classList.add("d-none")
});

// image or url

document.querySelector(".image-posts").addEventListener("click", () => {
    var selectvideoposts = document.querySelector(".select-image-posts")
    var selecturlposts = document.querySelector(".select-url-posts ")
    var selectvideoactives = document.querySelector(".circles")
    var selecturlactives = document.querySelector(".tick-greens")
    var circlevideos = document.querySelector(".circle-videos")
    var tickgreenvideos = document.querySelector(".tickgreen-videos")
    selectvideoposts.classList.remove("d-none")
    selecturlposts.classList.add("d-none")
    selectvideoactives.classList.remove("d-none")
    selecturlactives.classList.add("d-none")
    circlevideos.classList.add("d-none")
    tickgreenvideos.classList.remove("d-none")
});

document.querySelector(".image-url-posts").addEventListener("click", () => {
    var selectvideoposts = document.querySelector(".select-image-posts")
    var selecturlposts = document.querySelector(".select-url-posts ")
    var selectvideoactives = document.querySelector(".circles")
    var selecturlactives = document.querySelector(".tick-greens")
    var circlevideos = document.querySelector(".circle-videos")
    var tickgreenvideos = document.querySelector(".tickgreen-videos")
    selectvideoposts.classList.add("d-none")
    selecturlposts.classList.remove("d-none")
    selectvideoactives.classList.add("d-none")
    selecturlactives.classList.remove("d-none")
    circlevideos.classList.remove("d-none")
    tickgreenvideos.classList.add("d-none")
});

// inputs tags

function tagSelect() {
    return {
        open: false,
        textInput: '',
        tags: [],
        init() {
            this.tags = JSON.parse(this.$el.parentNode.getAttribute('data-tags'));
        },
        addTag(tag) {
            tag = tag.trim()
            if (tag != "" && !this.hasTag(tag)) {
                this.tags.push(tag)
            }
            this.clearSearch()
            this.$refs.textInput.focus()
            this.fireTagsUpdateEvent()
        },
        fireTagsUpdateEvent() {
            this.$el.dispatchEvent(new CustomEvent('tags-update', {
                detail: { tags: this.tags },
                bubbles: true,
            }));
        },
        hasTag(tag) {
            var tag = this.tags.find(e => {
                return e.toLowerCase() === tag.toLowerCase()
            })
            return tag != undefined
        },
        removeTag(index) {
            this.tags.splice(index, 1)
            this.fireTagsUpdateEvent()
        },
        search(q) {
            if (q.includes(",")) {
                q.split(",").forEach(function (val) {
                    this.addTag(val)
                }, this)
            }
            this.toggleSearch()
        },
        clearSearch() {
            this.textInput = ''
            this.toggleSearch()
        },
        toggleSearch() {
            this.open = this.textInput != ''
        }
    }
}

// slide

var span = document.getElementsByClassName('click');
var div = document.getElementsByClassName('tags');
var l = 0;
span[1].onclick = () => {
    l++;
    for (var i of div) {
        if (l == 0) { i.style.left = "0px"; }
        if (l == 1) { i.style.left = "-740px"; }
        if (l == 2) { i.style.left = "-1480px"; }
        if (l == 3) { i.style.left = "-2220px"; }
        if (l == 4) { i.style.left = "-2960px"; }
        if (l > 4) { l = 4; }
    }
}
span[0].onclick = () => {
    l--;
    for (var i of div) {
        if (l == 0) { i.style.left = "0px"; }
        if (l == 1) { i.style.left = "-740px"; }
        if (l == 2) { i.style.left = "-1480px"; }
        if (l == 3) { i.style.left = "-2220px"; }
        if (l < 0) { l = 0; }
    }
}

// image display

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

// url image show

var button = document.getElementById('url');
button.addEventListener('change', function (event) {
    var imageurl = document.getElementById('url').value;
    var img = document.createElement('img');
    img.src = imageurl;
    document.getElementById("img_url").appendChild(img);
    document.getElementById("addpost_none").style.display = "none";
})


// like button

$('.btn-counter').on('click', function (event, count) {
    event.preventDefault();
    var $this = $(this),
        count = $this.attr('data-count'),
        active = $this.hasClass('actives'),
        multiple = $this.hasClass('multiple-count');
    $.fn.noop = $.noop;
    $this.attr('data-count', !active || multiple ? ++count : --count)[multiple ? 'noop' : 'toggleClass']('actives');
});


// comment section

$(document).ready(function () {
    $(".comment").click(function () {
        $(".comment-section").toggle();
    });
});

// moment.js

var present = moment().startOf('hour').fromNow();
var moment = document.getElementById('momenttd');
moment.innerHTML = present;

// video display

// var video_file_input,
//   video_url_button,
//   image_file_input,
//   debug;

// function loadFileOrBlob(file, callback) {
//   var reader = new FileReader();
//   reader.onload = function (event) {
//     var result = event.target.result;
//     //
//     callback(result);
//   }
//   reader.readAsDataURL(file);
// }

// function createVideo(url) {
//   debug.innerHTML = '';
//   var html = '<video width="160px"><source src="' + url + '" type="video/mp4"></video>';
//   debug.insertAdjacentHTML('afterbegin', html);
// }

// function createImage(url) {
//   debug.innerHTML = '';

//   var html = '<img src="' + url + '" />';
//   debug.insertAdjacentHTML('afterbegin', html);
// }

// function isSuccessStatusCode(code) {
//   var test = code.toString();
//   var regex = /^(200|201|202|203|204|205|206)$/;
//   return regex.test(test);
// }

// function ajax(options) {
//   if (!options.url) throw new Error('No url found');
//   if (!options.callback) throw new Error('No callback function found');

//   if (!options.method) options.method = 'GET';

//   var req = new XMLHttpRequest();
//   req.onreadystatechange = function () {
//     if (req.readyState === 4) {
//       if (isSuccessStatusCode(req.status)) {
//         options.callback(this.response, req.status);
//       } else {
//         if (options.error) {
//           options.error(this);
//         }
//       }
//     }
//   };

//   req.open(options.method, options.url, true);
//   if (options.contentType) {
//     req.setRequestHeader('Content-type', options.contentType);
//   }
//   if (options.headers && options.headers instanceof Object) {
//     for (var key in options.headers) {

//       if (key.toLowerCase() == 'content-type' && options.contentType) {
//         continue;
//       }

//       if (options.headers.hasOwnProperty(key)) {
//         var value = options.headers[key];
//         req.setRequestHeader(key, value);
//       }
//     }
//   }
//   if (options.responseType) {
//     req.responseType = options.responseType;
//   }
//   if (options.data) {
//     req.send(options.data);
//   } else {
//     req.send();
//   }
// }

// function init() {
//   video_file_input = document.querySelector('.video_file');
//   video_url_button = document.querySelector('.video_url');
//   image_file_input = document.querySelector('.image_file');
//   debug = document.querySelector('.debug');

//   video_file_input.addEventListener('change', function () {
//     debug.innerHTML = 'Loading ...';
//     var file = this.files[0];
//     loadFileOrBlob(file, createVideo);
//   });

//   video_url_button.addEventListener('click', function () {
//     debug.innerHTML = 'Loading ...';
//     var options = {
//       method: 'GET',
//       url: 'https://dl.dropboxusercontent.com/u/57653109/html5video/video1.mp4',
//       responseType: 'blob',
//       callback: function (response, status) {
//         loadFileOrBlob(response, createVideo);
//       },
//       error: function (e) {
//         console.log(e.status);
//       }
//     };
//     ajax(options);
//   });

//   image_file_input.addEventListener('change', function () {
//     debug.innerHTML = 'Loading ...';
//     var file = this.files[0];
//     loadFileOrBlob(file, createImage);
//   });
// }

// document.addEventListener('DOMContentLoaded', init);


// unfollow follow button

$('.followingbtn').click(function () {
    $(this).text(function (_, text) {
        return text === "Follow" ? "Unfollow" : "Follow";
    });
    if ($(this).text() == "Follow") {
        $(this).removeClass('unfollow');
    } else if ($(this).text() == "Unfollow") {
        $(this).addClass('unfollow');
    }
});