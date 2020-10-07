function CloseMySelf(sender,Idd)
{
        
     try {}
    catch (err) {} 

         
        window.foo = '';
        var element = document.getElementsByTagName('span')[Idd];
		window.foo = element.getAttribute('id');
        parent.sDataValue=window.foo;
        parent.document.getElementById('icon_name').value=window.foo;
        top.tinymce.activeEditor.windowManager.close();
        return false;
}

function CloseMySelf2(sender,Idd)
{
        
     try {}
    catch (err) {} 

         
        window.foo = '';
        var element = document.getElementsByTagName('a')[Idd];
		window.foo = element.getAttribute('data-cat_id');
        parent.document.getElementById('cat_id').value = window.foo;
        top.tinymce.activeEditor.windowManager.close();
        return false;
}