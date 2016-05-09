// Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');

new Vue({

	el:'#roomcheck',

	data: {
		checkedParts:[],
		showForm: false,
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
			this.checkedParts.splice(0,this.checkedParts.length);
			this.$http.get($url,function(equipments){
				this.$set('equipments',equipments);
				console.log(JSON.stringify(equipments));
				this.showForm = true;
			});
		},

		checked:function(id){
			// comment.id.show();

		},

	}

});
