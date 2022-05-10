<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Tags</title>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
<div x-data @tags-update="console.log('tags updated', $event.detail.tags)" data-tags='["aaa","bbb"]' class="">
  <div x-data="tagSelect()" x-init="init('parentEl')" @click.away="clearSearch()" @keydown.escape="clearSearch()">
    <div class="relative border p-2 rounded" @keydown.enter.prevent="addTag(textInput)">
        <!-- selections -->
      <template x-for="(tag, index) in tags">
        <div class="bg-zinc-200 inline-flex items-center text-sm rounded mt-2 mr-1">
          <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
          <button @click.prevent="removeTag(index)" class="w-6 h-6 inline-block align-middle hover:text-gray-600 focus:outline-none">
          <img class="cursor-pointer" src="assets/icons/close-tag.svg"  alt="">
          </button>
        </div>
      </template>
      <input x-model="textInput" x-ref="textInput" @input="search($event.target.value)" class="outline-none" placeholder="Enter some tags">
    </div>
  </div>
</div>
<script>
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
</script>
</body>
</html>