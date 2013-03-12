<?php

namespace Avantages\Bundle\UserBundle\Service;

class UserManager
{
	protected $em;

	protected $mailer;

	protected $templating;

	public function __construct($em, $mailer, $templating)
	{
		$this->em = $em;
		$this->mailer = $mailer;
		$this->templating = $templating;
	}

	public function getEntityManager()
	{
		return $this->em;
	}

	public function getMailer()
	{
		return $this->mailer;
	}

	public function getTemplating()
	{
		return $this->templating;
	}

	public function createPartner($partner)
	{
		$message = \Swift_Message::newInstance()
        	->setSubject('Confirmation de votre inscription')
        	->setFrom('noreply@vipbox.fr')
        	->setTo($partner->getEmail())
        	->setBody($this->getTemplating()->render('AvantagesUserBundle:Mail:registration.txt.twig', array('user' => $partner)))
        ;
        if (!$this->getMailer()->send($message, $failures)) {
        	print_r($failures);
        	return false;
        }

        $em = $this->getEntityManager();
        $em->persist($partner);
        $em->flush();

        return true;
	}
}
