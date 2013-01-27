
$(function(){
     
      $("#Join_Agree").submit(function(){
            
            var chked = $('#agrees').attr('checked');
            var chked1 = $('#agrees1').attr('checked');
            
               
              if(!chked)

              {
                  alert('약관에 동의해주세요');
                  return false;
              }else  if(!chked1)

              {
                 window.alert('개인정보 약관에 동의해주세요');
                  return false;
              }


         });  
         
         
         
         
         $("#Join_Form").validate({
      rules: {
      user_id: "required",
      passwd: {
        required: true,
        minlength: 8
      },
      confirm_passwd: {
        required: true,
        minlength: 8,
        equalTo: "#passwd"
      },
      passwd_question:{
            required:true
      },
      passwd_answer:{
            required:true
      },
      user_name:{
            required:true
      },
      
      mail_address: {
        required: true,
        email: true
      },
      topic: {
        required: "#newsletter:checked",
        minlength: 2
      },
      
    },
    messages: {
      user_id: "ID를 입력해 주세요",
      passwd: {
        required: "암호를 입력해 주세요",
        minlength: "암호는 8자 이상이어야 합니다."
      },
      confirm_passwd: {
        required: "암호를 한 번 더 입력해 주세요",
        minlength: "암호는 8자 이상이어야 합니다.",
        equalTo: "암호가 일치하지 않습니다."
      },
      passwd_question:"질문을 입력해주세요.",
      passwd_answer:"답을 입력해주세요",
      user_name:"이름을 입력해주세요.",
      mail_address: "형식에 맞는 이메일을 입력해 주세요.",
     
    }
  });

         
        
    
});
     