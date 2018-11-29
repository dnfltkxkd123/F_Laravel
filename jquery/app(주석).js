var App = function(id, opt){//App라는 생성자 정의(id,opt)

	this.container = $(id);//id값을 container 값에 저장

	this.settings = opt || {};//opt의 값이 있으면 settings에 저장하고 없으면 빈객체({})를 settings에 저장

	this.mainMenuBar 

		= $('<ul class="app_main_menu_bar"></ul>');//'<ul class="app_main_menu_bar"></ul>'값을 mainMenuBar에 저장

	this.container.append(this.mainMenuBar);//id를 가진 객체(container)에 mainMenuBar값을 추가한다

	if(!!this.settings.toolbar){

		this.toolbar = $('<ul class="app_tool_bar">툴바</ul>');//

		this.container.append(this.toolbar);//

	}

};

 

App.prototype.setMainMenu = function(menu){//list값을 생성할 함수 setMainMenu를 선언

	if(menu && typeof menu == 'object' && menu.length){//menu가 있거나 menu 의속성이 object이거나 배열이면은 실행

		for(var i=0; i<menu.length; i++){//menu의 배열 길이 만큼 실행

			var item = menu[i];//i번째 배열의 값을 item에 저장

			if(item && item.name){//item이 빈값이 아니고 item안에 name이라는 key값이 있으면 실행

				var itemName = item.name;//item의 이름(name)을 itemName에 선언

				var itemShortcut = item.shortcut || '';//item의 단축키(shortcut) itemShortcut에 선언

				if(itemShortcut != ''){//단축키(itemShortcut)가 빈값이 아니면 실행

					itemName += '('+itemShortcut+')';//itemName안에 itemShortcut값 추가

				}//if문(item이 빈값이 아니고 item안에 name이라는 key값이 있으면 실행) 종료

				var mainMenuItem = $('<li class="app_main_menu_item">' + itemName + '</li>');//itemName을 이용해서 ul(mainMenuBar)안에 넣을 i번째 리스트 값(mainMenuItem) 설정

				this.mainMenuBar.append(mainMenuItem);//<ul>(mainMenuBar)안에 i번째 리스트값(mainMenuItem) 추가

				if(item.submenu){//서브메뉴 값이 있으면 실행

					var submenuUl = $("<ul class='app_sub_menu_list'></ul>");//서브 메뉴에 넣을 <ul>태그 submenuUl선언

					for(var j=0;j<item.submenu.length;j++){//서브 메뉴의 길이 만큼 실행

						var submenuItem = item.submenu[j];//서브메뉴의 j번째 배열의 값을 가질 submenuItem 선언

						if(submenuItem && submenuItem.name){//(submenuItem의 j번째 배열)submenuItem 과 submenuItem의 name값이 있으면 실행

							var submenuItemName = submenuItem.name;//(submenuItem의 j번째 배열)submenuItemName라는 변수를 선언하고 submenuItem의 name값(key)을 선언

							var submenuItemLi = $('<li>'+submenuItemName+'</li>');//(submenuItem의 j번째 배열)submenuItemName에서 정의한 값을 담을 리스트를 submenuItemLi에 선언

							if(submenuItem.click && typeof submenuItem.click === 'function'){//(submenuItem의 j번째 배열)if문 submenuItem의 click이라는 키값이 있고 value의 타입이 함수 이면 실행

								submenuItemLi.click(submenuItem.click);//(submenuItem의 j번째 배열)submenuItem.click의 값을 submenuItemLi에 저장

							}//if문(submenuItem 과 submenuItem의 name값이 있으면 실행) 종료

							submenuUl.append(submenuItemLi);//submenuUl 안에 j번째 리스트값(submenuItemLi) 추가

						}

					}

					mainMenuItem.append(submenuUl);//i번째 리스트(mainMenuItem) 안에 서브메뉴(j번째 리스트(submenuUl)) 추가

				}

			}

		}

	}

}