# ethereum-address
较验ETH地址的合法性   

参考这个js的方法改写了一个PHP版本
```
https://github.com/cilphex/ethereum-address
```

## 安装  

```
composer require lingyin/ethereum-address
```

## 使用

```

$checkLogic = new \lingyin\ethereum\address\Address();
$checkLogic->validate('0x122214');
$checkLogic->validate('0xbC2Ae4849E58ead2AE05308945bdD99550d73F8d')

```