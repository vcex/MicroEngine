var Site = new Object();

Site.execute = function(meth,args,success,error)
{
	var key = 'IJN9h9HioJNLkmLkmO';

	var q = 'key='+key+'&act='+meth+'&args='+args;

	$.ajax({

		url:'/ajax',
		type:'post',
		data:q,
		success:function(d)
		{
			success(d);
		},
		error:function(obj,num,str)
		{
			error(obj,num,str);
		},

	});

	return 0;
}
