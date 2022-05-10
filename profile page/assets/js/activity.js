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
        this.tags.push( tag )
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
      if ( q.includes(",") ) {
        q.split(",").forEach(function(val) {
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
      reader.onload = function(e){
      document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
      }
      reader.readAsDataURL(e.files[0]);
  }
}