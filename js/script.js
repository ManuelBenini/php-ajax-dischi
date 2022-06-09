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
      axios.get(this.apiUrl)
      .then(response =>{
        this.disks = response.data;
        console.log('Dischi', this.disks);
        if(this.disks.length === response.data.length){
          this.isLoaded = true;
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
  computed: {
    filteredDisks() {
      let filteredArray = [];
      if (this.selectedGenre === 'none') {
        filteredArray = this.disks;
      } else {
        filteredArray = this.disks.filter(disk => {
          return disk.genre.toLowerCase().includes(this.selectedGenre.toLowerCase());
        });
      }
      if (this.selectedAuthor != 'none') {
        filteredArray = filteredArray.filter(disk => {
          return disk.author.toLowerCase().includes(this.selectedAuthor.toLowerCase());
        });
      }
      console.log('array filtro genere e filtro artista', filteredArray);
      return filteredArray;
    }
  },
  mounted(){
    this.getApi();
  },
})