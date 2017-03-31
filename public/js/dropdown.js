// $(function() {
//     $('#magicsuggest').magicSuggest({
// 		data: 'DoctorController@speciality',		// call  controller  
//         valueField: 'idspeciality',
//         displayField: 'specialityName'
//     });
// });


import vSelect from "vue-select"
  export default {
    components: {vSelect},

    data() {
      return {
        selected: null,
        options: ['foo','bar','baz']
      }
    }
  }


