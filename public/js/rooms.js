Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


var roomcheck = new Vue({

	el:'#rooms',

	data: {
		checkedParts:[],
		showForm: false,		
    },

	ready: function(){
		this.fetchRooms();
	},

	methods:{
		fetchRooms: function(){
			this.$http.get('/rooms',function(rooms){
				this.$set('rooms',rooms);
			});
		},


	},

});
