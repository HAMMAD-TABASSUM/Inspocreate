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
var selectvideoposts = document.querySelector(".select-video-posts")
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
var selectvideoposts = document.querySelector(".select-video-posts")
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