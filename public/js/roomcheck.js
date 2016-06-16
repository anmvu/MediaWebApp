Vue.http.headers.common['X-CSRF-TOKEN'] = document.querySelector('#token').getAttribute('value');


var roomcheck = new Vue({

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
			$url = '/roomcheck/'+id+'/equipments';
			this.checkedParts.splice(0,this.checkedParts.length);
			this.$http.get($url,function(equipments){
				this.$set('equipments',equipments);
				this.showForm = true;
			});
			$time = '/roomcheck/'+id+'/checked';
			this.$http.get($time,function(data){
				console.log(data.return);
				this.$set('checked',"Last checked: " + data.return);
			})

			$user = '/roomcheck/'+id+'/checkedBy'
			this.$http.get($user,function(data){
				console.log(data.return);
				this.$set('user', data.return);
			})
		},

		roomClear: function(e){
			e.preventDefault();
			console.log('click');
			this.$http.post('/roomcheck',{room:this.selected},function(data){
				this.checked="Last checked: " + data.return;
				console.log(this.checked);
            });
			console.log(this.selected);
		},

		next: function(e){
			e.preventDefault();
			$url = "/roomcheck/comment/";
			$url += this.selected + "/";
			for($i = 0; $i < this.checkedParts.length; $i++){
				if($i == 0){
					$url += this.checkedParts[$i];
				}
				else{
					$url += "+" + this.checkedParts[$i];
				}
			}
			window.location= $url;
		},

	},

});
