@extends('emails.email')

@section('content')
@section('url','https://web.udgonline.com/clases/'.$lesson->nrc.'/tareas/'.$homework->slug)
    <table class="es-content" cellspacing="0" cellpadding="0" align="center"
        style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
        <tr style="border-collapse:collapse">
            <td align="center" style="padding:0;Margin:0">
                <table class="es-content-body"
                    style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:#FAFAFA;width:600px"
                    cellspacing="0" cellpadding="0" bgcolor="#fafafa" align="center">
                    <tr style="border-collapse:collapse">
                        <td style="Margin:0;padding-top:20px;padding-left:20px;padding-right:20px;padding-bottom:40px;background-repeat:no-repeat"
                            align="left">
                            <table width="100%" cellspacing="0" cellpadding="0"
                                style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                <tr style="border-collapse:collapse">
                                    <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                                        <table width="100%" cellspacing="0" cellpadding="0" role="presentation"
                                            style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                                            <tr style="border-collapse:collapse">
                                                <td align="center"
                                                    style="padding:0;Margin:0;padding-bottom:10px;padding-top:20px">
                                                    <h1
                                                        style="Margin:0;line-height:60px;mso-line-height-rule:exactly;font-family:lora, georgia, 'times new roman', serif;font-size:50px;font-style:normal;font-weight:normal;color:#333333">
                                                        <em>Se ha revisado una tarea</em>
                                                    </h1>
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="center"
                                                    style="padding:0;Margin:0;padding-top:10px;padding-bottom:10px; display: flex; align-items: center">
                                                    <h4
                                                        style="Margin:0;line-height:120%;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;color:#333333">
                                                        Fecha: </h4>
                                                        <p> {{date('d/m/Y h:i A')}} </p>
                                                </td>
                                            </tr>
                                            <tr style="border-collapse:collapse">
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px; display: flex; align-items: center">
                                                    <h6
                                                        style="Margin:0; margin-right: 5px; -webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        Maestro: </h6>
                                                    <p
                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        {{$lesson->user->name}}</p>
                                                </td>
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px; display: flex; align-items: center">
                                                    <h6
                                                        style="Margin:0; margin-right: 5px; -webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        Materia: </h6>
                                                    <p
                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        {{$lesson->name}}</p>
                                                </td>
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px; display: flex; align-items: center">
                                                    <h6
                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        Tarea: </h6>
                                                    <p
                                                        style="Margin:0; margin-right: 5px; -webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        {{$homework->name}}</p>
                                                </td>
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px; display: flex; align-items: center">
                                                    <h6
                                                        style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        Calificacion: </h6>
                                                    <p
                                                        style="Margin:0; margin-right: 5px; -webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                        {{$homework->pivot->score}}</p>
                                                </td>
                                                @isset($homework->pivot->note)
                                                    
                                                <td align="center" style="padding:0;Margin:0;padding-bottom:20px; display: flex; align-items: center">
                                                    <h6
                                                    style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                    Nota: </h6>
                                                    <p
                                                    style="Margin:0; margin-right: 5px; -webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:arial, 'helvetica neue', helvetica, sans-serif;line-height:21px;color:#333333;font-size:14px">
                                                    {{$homework->pivot->note}}</p>
                                                </td>
                                                @endisset
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
@endsection
