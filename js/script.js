const app = new Vue({
  el: '#app',
  data:{
    apiUrl: 'http://localhost/php-ajax-dischi/api.php',
    disks: [],
    genres: [],
    authors: [],
    selectedGenre: 'none',
    selectedAuthor: 'none',
    isLoaded: false
  },
  methods:{
    getApi(){
      axios.get(this.apiUrl, {
        params: {
          genre: this.selectedGenre,
          author: this.selectedAuthor
        }
      })
      .then(response =>{
        this.disks = response.data;
        console.log('Dischi', this.disks);
        if(this.disks.length === response.data.length){
          this.isLoaded = true;
        }
        if(this.genres.length === 0 && this.authors.length === 0){
          this.getGenresAndAuthors();
        }
      })
    },
    getGenresAndAuthors(){
      this.disks.forEach(disk => {
        if (!this.genres.includes(disk.genre)){
          this.genres.push(disk.genre);
        }
        if (!this.authors.includes(disk.author)){
          this.authors.push(disk.author);
        }
      });

      console.log('Lista generi', this.genres);
      console.log('Lista autori', this.authors);
    },
  },
  mounted(){
    this.getApi();
  },
})