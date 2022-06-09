const app = new Vue({
  el: '#app',
  data:{
    apiUrl: 'http://localhost/php-ajax-dischi/api.php',
    disks: [],
    genres: [],
    authors: [],
    isLoaded: false
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl)
      .then(response =>{
        this.disks = response.data;
        console.log('Dischi', this.disks);
        if(this.disks.length === response.data.length){
          this.isLoaded = true;
          this.getGenresList();
          this.getAuthorsList();
        }
      })
    },
    getGenresList(){
      this.disks.forEach(disk => {
        if (!this.genres.includes(disk.genre)){
          this.genres.push(disk.genre);
        }
      });

      console.log('Lista generi', this.genres);
    },
    getAuthorsList(){
      this.disks.forEach(disk => {
        if (!this.authors.includes(disk.author)){
          this.authors.push(disk.author);
        }
      });

      console.log('Lista autori', this.authors);
    }
  },
  mounted(){
    this.getApi();
  },
})