// // functionの中でajaxを使う
// // renderの中でajaxでとってきたデータを受け取る
// // 受け取ったデータに対してforeachでdocumentを作る
// class View {
//     constructor() {
//         this.users = [];
//         // this.render();
//         this.getAjaxData();
//     }

//     // render() {
//     //     this.getAjaxData();
//     //     const userDocument = `
//     //     <div class="card" style="width: 18rem;">
//     //         <img class="card-img-top" src="images/sample.jpg" alt="Card image cap">
//     //         <div class="card-body">
//     //             <h5 class="card-title">`+  +`</h5>
//     //     `
//     // }

//     getAjaxData() {
//         $.ajax({
//             url: './home.php',
//             type: "POST",
//             dataType: "text",
//         }).done(data =>{
//             console.log(data);
//             this.users.push(data);
//             console.log(this.users);
//         }).fail(function(xhr,err){
//             console.log(err);
//         });
//     }
// }

// let view = new View();

// $(function(){
//     $("#btnLike").on('click', function(event){
//         event.preventDefault();
//         var param = {
//                 "fromid":  
//                 "toid":
//             };
 
//         $.ajax({
//             type: "GET",
//             url: "get-jsonp.php",
//             data: param,
//             crossDomain: true,
//             dataType : "jsonp",
//             scriptCharset: 'utf-8'
//         }).done(function(data){
//             alert(data.text);
//         }).fail(function(XMLHttpRequest, textStatus, errorThrown){
//             alert(errorThrown);
//         });
//     });
// });