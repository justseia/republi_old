<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title></title>
	<style>
        @media (min-width: 768px) {
            .md\:p-10 {
                padding: 2.5rem;
            }

            .md\:px-\[100px\] {
                padding-left: 100px;
                padding-right: 100px;
            }

            .md\:text-\[30px\] {
                font-size: 30px;
            }

            .md\:text-\[18px\] {
                font-size: 18px;
            }

            .md\:text-\[72px\] {
                font-size: 72px;
            }
        }
	</style>
</head>
<body>
<div style="display: flex; justify-content: center;background-color: rgb(243, 244, 245);">
	<div class="md:p-10" style="display: flex; flex-direction: column; justify-content: center; padding: 1.25rem; text-align: center;">
		<div style="display: flex; justify-content: center;">
			<img src="{{ asset('assets/images/logo.png') }}" alt="" style="width: 160px;" width="160">
		</div>
		<div class="md:px-[100px]" style="width: auto; max-width: 600px; background-color: rgb(255 255 255); padding-top: 2.5rem; padding-bottom: 2.5rem; padding-left: 50px; padding-right: 50px;">
			<div class="md:text-[30px]" style="margin-bottom: 1.25rem; font-size: 22px; font-weight: 700; color: rgb(75 85 99);">Добро пожаловать в Republi!</div>
			<div class="md:text-[18px]" style="margin-bottom: 1.25rem; font-size: 12px; font-weight: 400; font-style: italic; color: rgb(75 85 99);">Код подтверждения электронной почты</div>
			<div class="md:text-[72px]" style="display: flex; justify-content: center; font-size: 50px; font-weight: 500; color: rgb(75 85 99);">
				<div>{{ $code }}</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
