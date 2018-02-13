var user = {};
user.name = 'Вася';
user.surname = 'Петров';
user.name = 'Сергей';
//delete user.name;

for (var key in user){
    alert ( "Ключ: " + key + " значение: " + user[key] );
}

var goods = [1, 2, 3, 4, 5]

alert (goods[goods.length - 1])