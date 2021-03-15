class Formula
{
	private form = null;
	private rawformula;
	private parseposition;
	
	constructor(rawform)
	{
	ax + bx + c - (ax+c+b+b)(ax+b+b+b)
		ax+c+b+b => ax+c+2b
		ax+b+b+b => ax+3b
		
		rawformula = rawform;
		parsePart(segment);

	}
	
	public get()
	{
		return form;
	}
	
	parsePart(subPart)
	{
		
		if rawform[i] == '('
		{
			subFormula = new Formula(rawform.substr(i+1, positionnextbracket))
			ax+c+2b
			form +=parsePart(subFormula.get());
		}
		else
		{
			form += parsePart();
		}

		
	}
	
}

array_push($array, "vraag1");
array_push($array, "vraag2");
array_push($array, "vraag3");

for ($i = 0; $i < count($array); $i++)
{
	
	
	
}