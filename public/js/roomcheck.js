// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


new Vue({

	el:'#roomcheck',

	data: {
    },

	ready: function(){
		this.fetchRooms();
	},

	methods:{
		fetchRooms: function(){
			this.$http.get('/roomcheck/all',function(rooms){
				this.$set('rooms',rooms);
			});
		},

		fetchEquipments:function(id){
			$url = '/roomcheck/'+id;
			console.log(id);
			this.$http.get($url,function(equipments){
				this.$set('equipments',equipments);
			});
		},

	}


});