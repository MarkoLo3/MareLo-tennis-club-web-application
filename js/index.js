document.addEventListener('DOMContentLoaded', function() {
    ispisiCitat();
});



const ispisiCitat = () => {
    
    var citat = new Array(11);
    var autor = new Array(11);
    
    
    citat[0] = 'I have two lives, and all the problems I might have, I feel like I drop them once I step on to the match court.';
    autor[0] = 'Roger Federer';
    
    citat[1] ='I play each point like my life depends on it.';
    autor[1] ='Rafael Nadal';
    
    citat[2] ='Success is a journey, not a destination. The doing is often more important than the outcome.';
    autor[2] ='Arthur Ashe';
    
    citat[3] ='Tennis is a mental game. Everyone is fit, everyone hits great forehands and backhands.';
    autor[3] ='Novak Djokovic';
    
    citat[4] ="Sometimes I wish I could have been a bit more relaxed, but then I wouldn't have been the same player.";
    autor[4] ='Steffi Graf';
    
    citat[5] ='Tennis uses the language of life. Advantage, service, fault, break, love - the basic elements of tennis are those of everyday existence, because every match is a life in miniature.';
    autor[5] ='Andre Agassi';
    
    citat[6] ="The depressing thing about tennis is that no matter how good I get, I'll never be as good as a wall.";
    autor[6] ="Mitch Hedberg";
    
    citat[7] ="It's one-on-one out there, man. There ain't no hiding. I can't pass the ball.";
    autor[7] ='Pete Sampras';
    
    citat[8] ='What is the single most important quality of a tennis champion? I would have to say desire, staying in there and winning matches when you are not playing that well.';
    autor[8] ='John McEnroe';
    
    citat[9] ='The mark of great sportsmen is not how good they are at their best, but how good they are at their worst.';
    autor[9] ='Martina Navratilova';
    
    citat[10] ="You don't have to hate your opponents to beat them.";
    autor[10] ='Kim Clijsters';
    
    citat[11] ="I've grown most not from victories, but setbacks. If winning is God's reward, then losing is how He teaches us.";
    autor[11] ='Serena Williams';
    
    index = Math.floor(Math.random()*citat.length);
    document.getElementById("citat").innerHTML = citat[index];
    document.getElementById("autor").innerHTML = autor[index];

}

