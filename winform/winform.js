/*winform javascript code*/
var MenuItem = function(settings){
    this.settings = settings || {};
    this.text = settings.text || '';
    this.onclick = settings.onclick || function(){return false;};
    this.$el = $('<li class="app_main_menu_item">'+this.text+'</li>');
    this.$el.click(this.onclick./*this라는 키워드의 주체를 바꿈*/bind(this));
}

var MainMenuBar = function(){
    this.menuList = [];
    this.$el = $('<ul class="app_main_menu_bar"></ul>');
};

MainMenuBar.prototype.enable = function(enable){
    //hide ? this.$el.hide() : this.$el.show();
    //enable ? this.$el.fadeOut(50000) : this.$el.remove();
}

MainMenuBar.prototype.addMainMenu = function(menuItem){
    this.menuList.push(menuItem);
    this.$el.append(menuItem.$el);
}

var WinForm = function(tagId){
    this.tagId = tagId || '';
    if(tagId == ''){
        throw new Error('Need tag id.');
    }
    this.$el = $(tagId);
    
    this.mainMenuBar = new MainMenuBar();
    this.$el.append(this.mainMenuBar.$el);
};

WinForm.prototype.backgroundColor = function(){
    if(arguments.length == 0){
        return this.$el.css("backgroundColor");
    }
    this.$el.css("backgroundColor",arguments[0]);
    
}/*prototype 다른객체가 선언되어도 새로운 메소드가 생기지 않게함 java의 static과 비슷한기능 같은기능을 공유할때 유용*/