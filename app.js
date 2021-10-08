new Vue({
    el: "#app",
    data: {
        isShow1: false,
        isShow2: false
    },
    methods: {
        isShowText() {
          this.isShow1 = !this.isShow1;
          this.isShow2 = !this.isShow2;
      }
    }
  })