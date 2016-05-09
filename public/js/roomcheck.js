// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


new Vue({

	el:'#roomcheck',

	data: {
		checkedParts:[]
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
			console.log($url);
			this.$http.get($url,function(equipments){
				this.$set('equipments',equipments);
			});
		},

	}


});